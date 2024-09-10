Lock screen
======

Add a lock screen page to laravel-admin.

## Screenshots

![wx20181114-232541](https://user-images.githubusercontent.com/1479100/48492459-c720f680-e864-11e8-934a-932d287479c4.png)

## Installation & Configuration

```bash
composer require dedermus/lock-screen
```

Then add a middleware `admin.lock` to routes configuration in `config/admin.php`

```php

    'route' => [

        'prefix' => env('ADMIN_ROUTE_PREFIX', 'admin'),

        'namespace'     => 'App\\Admin\\Controllers',

        // add middleware `admin.lock` into this array.
        'middleware'    => ['web', 'admin', 'admin.lock'],
    ],

```

## Usage

After installation and configuration, open the admin page, you will find a link in the upper right corner of the page with a lock icon, click it to redirect to the lock screen page,
You need to enter your login password to return to unlock the page.

License
------------
Licensed under [The MIT License (MIT)](LICENSE).
