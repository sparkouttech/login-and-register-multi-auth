# User Authentication

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sparkouttech/user-multi-auth.svg?style=flat-square)](https://packagist.org/packages/sparkouttech/user-multi-auth)
<a href="https://packagist.org/packages/sparkouttech.user-multi-auth"><img src="https://img.shields.io/packagist/php-v/sparkouttech.user-multi-auth?style=flat-square" alt="PHP version"></a>
[![Packagist](https://img.shields.io/packagist/l/sparkouttech/user-multi-auth.svg)](https://packagist.org/packages/sparkouttech/user-multi-auth) 
[![Total Downloads](https://img.shields.io/packagist/dt/sparkouttech/user-multi-auth.svg?style=flat-square)](https://packagist.org/packages/sparkouttech/user-multi-auth)

Complete user authentication system for laravel projects. One step installation with clean code.

## Installation

You can install the package via composer:

bash
composer require sparkouttech/user-multi-auth


## Usage

php
// add below line in config/App.php providers array

Sparkouttech\UserMultiAuth\UserMultiAuthServiceProvider::class,


Run below command to publish assets 
php
php artisan vendor:publish --provider="Sparkouttech\UserMultiAuth\UserMultiAuthServiceProvider" --tag=UserMultiAuthAssets --force


php
// run below command to import user tables 
php artisan migrate


### Testing

bash
composer test


### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email developer@sparkouttech.com instead of using the issue tracker.

## Credits

-   [Sparkouttech](https://github.com/sparkouttech)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.