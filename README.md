# A Mailchimp app for Strata

[![Latest Version on Packagist](https://img.shields.io/packagist/v/astrogoat/mailchimp.svg?style=flat-square)](https://packagist.org/packages/astrogoat/mailchimp)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/astrogoat/mailchimp/run-tests?label=tests)](https://github.com/astrogoat/mailchimp/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/astrogoat/mailchimp/Check%20&%20fix%20styling?label=code%20style)](https://github.com/astrogoat/mailchimp/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/astrogoat/mailchimp.svg?style=flat-square)](https://packagist.org/packages/astrogoat/mailchimp)

A simple wrapper for [Mailchimps PHP SDK](https://mailchimp.com/developer/marketing/api/).

## Installation

You can install the package via composer:

```bash
composer require astrogoat/mailchimp
```

## Usage

```php
$mailchimp = resolve(\Astrogoat\Mailchimp\Mailchimp::class);
$mailchimp->ping->get();

// {
//   "health_status": "Everything's Chimpy!"
// }
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Laura Tonning](https://github.com/tonning)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
