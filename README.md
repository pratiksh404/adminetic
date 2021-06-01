# Adminetic Admin Panel

![Adminetic](https://github.com/pratiksh404/adminetic/blob/master/payload/static/documentation/banner.jpg)

[![Issues](https://img.shields.io/github/issues/pratiksh404/adminetic)](https://github.com/pratiksh404/adminetic_blog/issues) [![Stars](https://img.shields.io/github/stars/pratiksh404/adminetic)](https://github.com/pratiksh404/adminetic_blog/stargazers) [![License](https://img.shields.io/github/license/pratiksh404/adminetic)](https://github.com/pratiksh404/adminetic/blob/master/LICENSE)

Headstart your project with adminetic admin panel with single command.

#### Contains : -

- User Management
- Role and Permission Management
- Activity Management
- Auth Management
- Setting Management
- Preference Management
- Theme Customization
- Plugin Extensions

## Installation

You can install the package via composer:

```bash
composer require pratiksh/adminetic
```

Install Adminetic

```sh
php artisan install:adminetic
```

Import Data

```sh
php artisan adminetic:dummy
```

Use adminetic auth route.
In web.php paste following

```sh
Route::admineticAuth();
```

This allows you to have necessary login credential

> Admin Credential
> email : admin@admin.com
> password: admin123

## Notice

Stay tuned for futher documentaion.

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email pratikdai404@gmail.com instead of using the issue tracker.

## Credits

- [Pratik Shrestha](https://github.com/pratiksh)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).

### Admin Panel Screenshot

![Adminetic](https://github.com/pratiksh404/adminetic/blob/master/payload/static/documentation/dashboard.jpg)
![Adminetic](https://github.com/pratiksh404/adminetic/blob/master/payload/static/documentation/profile.jpg)
![Adminetic](https://github.com/pratiksh404/adminetic/blob/master/payload/static/documentation/bread.jpg)
![Adminetic](https://github.com/pratiksh404/adminetic/blob/master/payload/static/documentation/role.jpg)
![Adminetic](https://github.com/pratiksh404/adminetic/blob/master/payload/static/documentation/activity.jpg)
![Adminetic](https://github.com/pratiksh404/adminetic/blob/master/payload/static/documentation/login.jpg)
