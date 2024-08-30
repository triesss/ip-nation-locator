# ip-nation-locator

This package is used to get the country of an IP address.
You can use the `IpNationLocator` class to get the country of an IP address.
To make the class work, you need to provide a CSV or Sqlite3 file containing the IP ranges and the country codes.

## Requirements

- A CSV or Sqlite3 file containing the IP ranges and the country codes
  in [ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2)
    - The CSV file should have the following columns:
        - `ip_network`: The network address with its' subnet mask, e.g. `1.2.0.0/24`
        - `country_code`: The country code
    - The Sqlite3 file must have a table `ip_networks` with the following columns:
        - `ip_network`: The network address with its' subnet mask, e.g. `1.2.0.0/24`
        - `country_code`: The country code
