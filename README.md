# User Authentication

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sparkouttech/user-auth.svg?style=flat-square)](https://packagist.org/packages/sparkouttech/user-auth)
<a href="https://packagist.org/packages/sparkouttech.user-auth"><img src="https://img.shields.io/packagist/php-v/sparkouttech.user-auth?style=flat-square" alt="PHP version"></a>
[![Packagist](https://img.shields.io/packagist/l/sparkouttech/user-auth.svg)](https://packagist.org/packages/sparkouttech/user-auth) 
[![Total Downloads](https://img.shields.io/packagist/dt/sparkouttech/user-auth.svg?style=flat-square)](https://packagist.org/packages/sparkouttech/user-auth)

Complete user authentication system for laravel projects. One step installation with clean code.

## Installation

You can install the package via composer:

```bash
composer require sparkouttech/user-auth
```

## Usage

```php
// add below line in config/App.php providers array

Sparkouttech\UserMultiAuth\UserAuthServiceProvider::class,
```

Run below command to publish assets 
```php
php artisan vendor:publish --provider="Sparkouttech\UserMultiAuth\UserAuthServiceProvider" --tag=UserAuthAssets --force
```

```php
// run below command to import user tables 
php artisan migrate
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email gotocva@gmail.com instead of using the issue tracker.

## Credits

-   [sivabharathy](https://github.com/gotocva)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

