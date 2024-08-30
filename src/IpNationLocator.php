<?php

namespace Triesss\IpNationLocator;

use Exception;
use InvalidArgumentException;
use SQLite3;

class IpNationLocator
{
    private string $libraryFile;

    protected string $libraryType = 'csv';

    /**
     * @var array|string[] $possibleTypes
     */
    protected array $possibleTypes = ['csv', 'sqlite3'];

    /**
     * @throws Exception
     */
    public function __construct(string $libraryFile = 'ip2nation.csv')
    {
        $this->loadLibrary($libraryFile);
    }

    public function getLibraryFile(): string
    {
        return $this->libraryFile;
    }

    /**
     * @throws Exception
     */
    public function initLibrary(): void
    {
        if (! in_array($this->libraryType, $this->possibleTypes)) {
            throw new Exception('Invalid library type');
        }
    }

    /**
     * @throws Exception
     */
    private function loadLibrary(string $libraryPath): void
    {
        echo $libraryPath;
        if (! file_exists($libraryPath)) {
            throw new InvalidArgumentException('Library path does not exist');
        }

        $this->libraryFile = $libraryPath;

        $fileType = $this->getLibraryFileType();

        if (! in_array($fileType, $this->possibleTypes)) {
            throw new Exception('Invalid library type');
        }

        $this->libraryType = $fileType;

        if ($this->libraryType === 'csv') {
            $this->loadCsvLibrary();
        } elseif ($this->libraryType === 'sqlite3') {
            $this->loadSqlite3Library();
        }
    }

    private function getLibraryFileType(): string
    {
        return pathinfo($this->libraryFile, PATHINFO_EXTENSION);
    }

    /**
     * @throws Exception
     */
    private function loadCsvLibrary(): void
    {
        // Open the CSV file
        $file = fopen($this->libraryFile, 'r');

        // Read the first line from the CSV file
        $headers = fgetcsv($file);

        // Check if the headers include 'ip_network' and 'country_code'
        if (! in_array('ip_network', $headers) || ! in_array('country_code', $headers)) {
            throw new Exception('CSV file does not have the required headers (ip_network, country_code)');
        }

        // Close the CSV file
        fclose($file);
    }

    /**
     * @throws Exception
     */
    private function loadSqlite3Library(): void
    {
        // Check if the SQLite3 file exists and is readable
        if (! is_readable($this->libraryFile)) {
            throw new Exception('SQLite3 database file does not exist or is not readable');
        }

        // Open the SQLite3 database file
        $database = new SQLite3($this->libraryFile);

        // Check if the 'ip_networks' table exists
        $result = $database->query('SELECT name FROM sqlite_master WHERE type="table" AND name="ip_networks"');

        if (! $result->fetchArray()) {
            $database->close();
            throw new Exception('SQLite3 database file does not have the required table (ip_networks)');
        }

        // Check if the 'ip_networks' table has the required columns
        $result = $database->query('PRAGMA table_info(ip_networks)');
        $columns = ['ip_network', 'country_code'];

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $columns = array_diff($columns, [$row['name']]);
        }

        if (! empty($columns)) {
            $database->close();
            throw new Exception('SQLite3 database file does not have the required columns (ip_network, country_code)');
        }

        // Close the database connection
        $database->close();
    }

    private function IpBelongsToNetwork(string $ip, string $network): bool
    {
        [$networkAddress, $subnetMask] = explode('/', $network);
        $subnetMask = intval($subnetMask);

        $ipAddress = ip2long($ip);
        $networkAddress = ip2long($networkAddress);
        $subnetMask = pow(2, 32) - pow(2, 32 - $subnetMask);

        return ($ipAddress & $subnetMask) === ($networkAddress & $subnetMask);
    }

    public function getCountryCode(string $ip): string
    {
        if ($this->libraryType === 'csv') {
            return $this->getCountryCodeFromCsv($ip);
        } elseif ($this->libraryType === 'sqlite3') {
            return $this->getCountryCodeFromSqlite3($ip);
        }

        return '';
    }

    public function getCountryName(string $ip): string
    {
        $countryCode = $this->getCountryCode($ip);

        if (empty($countryCode)) {
            return '';
        }

        return $this->getCountryNameByCountryCode($countryCode);
    }

    private function getCountryNameByCountryCode(string $countryCode): string
    {
        if (strlen($countryCode) == 2) {
            return Alpha2CountryCodeMapper::getConstantByCode($countryCode);
        }

        return '';
    }

    private function getCountryCodeFromCsv(string $ip): string
    {
        $file = fopen($this->libraryFile, 'r');
        fgetcsv($file);

        while (($row = fgetcsv($file)) !== false) {
            if ($this->IpBelongsToNetwork($ip, $row[0])) {
                fclose($file);

                return $row[1];
            }
        }

        fclose($file);

        return '';
    }

    private function getCountryCodeFromSqlite3(string $ip): string
    {
        $database = new SQLite3($this->libraryFile);

        // Split the IP into its subnet components
        $ipComponents = explode('.', $ip);

        // Initialize the query string
        $query = "SELECT ip_network, country_code FROM ip_networks WHERE ";

        // Loop through each subnet component and add it to the query
        for ($i = 0; $i < count($ipComponents); $i++) {
            // Add the current subnet to the query
            $subnet = implode('.', array_slice($ipComponents, 0, $i + 1)).'%';
            $query .= "ip_network LIKE '$subnet'";

            // If this is not the last subnet, add an OR to the query
            if ($i < count($ipComponents) - 1) {
                $query .= " OR ";
            }
        }

        // Execute the query
        $result = $database->query($query);

        // Loop through the results
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            // Check if the IP belongs to the current subnet
            if ($this->IpBelongsToNetwork($ip, $row['ip_network'])) {
                $database->close();

                return $row['country_code'];
            }
        }

        return '';
    }
}