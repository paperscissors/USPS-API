# PHP USPS API integration

[![Latest Version on Packagist](https://img.shields.io/packagist/v/paperscissorsandglue/USPS-API.svg?style=flat-square)](https://packagist.org/packages/paperscissorsandglue/USPS-API)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/paperscissorsandglue/USPS-API/run-tests?label=tests)](https://github.com/paperscissorsandglue/USPS-API/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/paperscissorsandglue/USPS-API.svg?style=flat-square)](https://packagist.org/packages/paperscissorsandglue/USPS-API)


Based on original PHP library by Vincent Gabriel, modernized in Spatie package template for best practices and posterity. Currently only the rate API classes are ported. Documentation and further integration ASAP.

## Installation

You can install the package via composer:

```bash
composer require paperscissorsandglue/usps-api-integration
```

## Usage

``` php
$usps = new USPSApi("my api key");
$rate = $usps->rate();
//TODO: add packages, get estimate to documentation
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Tom Filepp](https://github.com/paperscissors)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
