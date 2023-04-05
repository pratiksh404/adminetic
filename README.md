# Adminetic Admin Panel

![Adminetic](https://github.com/pratiksh404/adminetic/blob/main/payload/static/documentation/banner.png)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pratiksh/adminetic.svg?style=flat-square)](https://packagist.org/packages/pratiksh/adminetic)
[![Stars](https://img.shields.io/github/stars/pratiksh404/adminetic)](https://github.com/pratiksh404/adminetic/stargazers) [![Downloads](https://img.shields.io/packagist/dt/pratiksh/adminetic.svg?style=flat-square)](https://packagist.org/packages/pratiksh/adminetic) [![StyleCI](https://github.styleci.io/repos/372560942/shield?branch=main)](https://github.styleci.io/repos/372560942?branch=main) [![Build Status](https://scrutinizer-ci.com/g/pratiksh404/adminetic/badges/build.png?b=main)](https://scrutinizer-ci.com/g/pratiksh404/adminetic/build-status/main) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pratiksh404/adminetic/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/pratiksh404/adminetic/?branch=main) [![CodeFactor](https://www.codefactor.io/repository/github/pratiksh404/adminetic/badge)](https://www.codefactor.io/repository/github/pratiksh404/adminetic) [![License](https://img.shields.io/github/license/pratiksh404/adminetic)](//packagist.org/packages/pratiksh/adminetic)

Headstart your project with adminetic admin panel with single command.

For detailed documentaion visit [Adminetic Documentation](https://pratikdai404.gitbook.io/adminetic/)

#### Contains : -

- CRUD Scaffold Generator
- ACL Generator(BREAD Control)
- Super Admin Generator
- Repo Pattern Generator
- API Scaffold Generator
- User Management
- Role and Permission Management
- Activity Management
- Auth Management
- Setting Management
- Preference Management
- Theme Customization
- Plugin Extensions

## Installation Via Adminetic CLI
Make sure to install adminetic cli
```
composer global require adminetic/cli
```

Make sure that you have created database named same as ur `project_name`
```
adminetic new project_name
```
All your setup process will be automated.
## Installation

You can install the package via composer:

```bash
composer require pratiksh/adminetic
```

Add AdmineticUser Trait.
In your user model,

```sh
use Pratiksh\Adminetic\Traits\AdmineticUser;
class User extends Authenticatable
{
    use AdmineticUser;
    ....
}
```

Install Adminetic

```sh
php artisan install:adminetic
```

Migrate Database

```sh
php artisan migrate
```

Import Data

```sh
php artisan adminetic:dummy
```

Note: If we enable migrate_wth_dummy in adminetic config file dummy data are seeded on migration. Then above command can be avoided.

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

![Adminetic](https://github.com/pratiksh404/adminetic/blob/main/payload/static/documentation/webcapture.jpeg)
![Adminetic](https://github.com/pratiksh404/adminetic/blob/main/payload/static/documentation/dashboard.jpg)
![Adminetic](https://github.com/pratiksh404/adminetic/blob/main/payload/static/documentation/profile.jpg)
![Adminetic](https://github.com/pratiksh404/adminetic/blob/main/payload/static/documentation/bread.jpg)
![Adminetic](https://github.com/pratiksh404/adminetic/blob/main/payload/static/documentation/role.jpg)
![Adminetic](https://github.com/pratiksh404/adminetic/blob/main/payload/static/documentation/activity.jpg)
![Adminetic](https://github.com/pratiksh404/adminetic/blob/main/payload/static/documentation/login.jpg)
