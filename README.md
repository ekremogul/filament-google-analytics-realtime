# This is my package filament-google-analytics-realtime

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ekremogul/filament-google-analytics-realtime.svg?style=flat-square)](https://packagist.org/packages/ekremogul/filament-google-analytics-realtime)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ekremogul/filament-google-analytics-realtime/run-tests?label=tests)](https://github.com/ekremogul/filament-google-analytics-realtime/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ekremogul/filament-google-analytics-realtime/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/ekremogul/filament-google-analytics-realtime/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ekremogul/filament-google-analytics-realtime.svg?style=flat-square)](https://packagist.org/packages/ekremogul/filament-google-analytics-realtime)


## Installation

You can install the package via composer:

```bash
composer require ekremogul/filament-google-analytics-realtime
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-google-analytics-realtime-config"
```

This is the contents of the published config file:

```php
return [
    'view_id' => '',
    'key_file' => storage_path('app/analytics/service-account-credentials.json'),
    'interval' => '60s',
];
```
# Important
How to obtain the credentials to communicate with Google Analytics

[**Please follow the steps in spatie's description to get the view_id and service-account-credentials.json files**](https://github.com/spatie/laravel-analytics#how-to-obtain-the-credentials-to-communicate-with-google-analytics)


#
#

Optionally, you can publish the translation

```bash
php artisan vendor:publish --tag="filament-google-analytics-realtime-translations"
```

## Usage
Add to config/filament.php file
```php
....
    'widgets' => [
        'namespace' => 'App\\Filament\\Widgets',
        'path' => app_path('Filament/Widgets'),
        'register' => [
            ....
            \Ekremogul\FilamentGoogleAnalyticsRealtime\Widgets\RealtimeAnalytics::class,
        ],
    ],
....
```


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ekrem OĞUL](https://github.com/ekremogul)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
