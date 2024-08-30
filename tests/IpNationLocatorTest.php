<?php

namespace Triesss\IpNationLocator\Tests;

use PHPUnit\Framework\TestCase;
use Triesss\IpNationLocator\IpNationLocator;

class IpNationLocatorTest extends TestCase
{
    public function testGetLibraryFromCsvFile(): void
    {
        $locator = new IpNationLocator(__DIR__.'/stubs/ip2nation_test.csv');
        $this->assertEquals(__DIR__.'/stubs/ip2nation_test.csv', $locator->getLibraryFile());
    }

    public function testGetLibraryFromSqliteFile(): void
    {
        $locator = new IpNationLocator(__DIR__.'/stubs/ip2nation_test.sqlite3');
        $this->assertEquals(__DIR__.'/stubs/ip2nation_test.sqlite3', $locator->getLibraryFile());
    }

    public function testFailToInitializeInlBecauseOfMissingLibraryFile(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        if (file_exists(__DIR__.'/stubs/does_not_exist.csv')) {
            unlink(__DIR__.'/stubs/does_not_exist.csv');
        }
        new IpNationLocator(__DIR__.'/stubs/does_not_exist.csv');
    }

    public function testFailToInitializeInlBecauseOfMissingSqliteDatabaseTable(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new IpNationLocator(__DIR__.'/stubs/ip2nation_broken_test.sqlite3.csv');
    }

    public function testGetAValidCountryCode(): void
    {
        foreach (['csv', 'sqlite3'] as $type) {
            $locator = new IpNationLocator(__DIR__.'/stubs/ip2nation_test.'.$type);
            $this->assertEquals('DE', $locator->getCountryCode('192.168.178.50'));
        }
    }

    public function testGetAnEmptyCountryCode(): void
    {
        foreach (['csv', 'sqlite3'] as $type) {
            $locator = new IpNationLocator(__DIR__.'/stubs/ip2nation_test.'.$type);
            $this->assertEquals('', $locator->getCountryCode('1.1.1.1'));
        }
    }

    public function testGetACountryName(): void
    {
        foreach (['csv', 'sqlite3'] as $type) {
            $locator = new IpNationLocator(__DIR__.'/stubs/ip2nation_test.'.$type);
            $this->assertEquals('GERMANY', $locator->getCountryName('192.168.178.50'));
        }
    }

    public function testGetAnEmptyCountryName(): void
    {
        foreach (['csv', 'sqlite3'] as $type) {
            $locator = new IpNationLocator(__DIR__.'/stubs/ip2nation_test.'.$type);
            $this->assertTrue(empty($locator->getCountryName('1.1.1.1')));
        }
    }
}