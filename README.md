# DO Serverless - PHP - Extension KO

`ext-ftp` works when running on `8.0` runtime but not on `8.2` runtime.

## How to reproduce

1. Clone the project
2. Deploy the functions -> `doctl serverless deploy . --remote-build`


`ftp-extension/ok` successfully build and deploy  
Invoke the function by running `doctl serverless functions invoke ftp-extension/ok`
> The function successfully connects to the ftp


`ftp-extension/ko` failed to build with the following error
```
Installing dependencies from lock file
Verifying lock file contents can be installed on current platform.
Your lock file does not contain a compatible set of packages. Please run composer update.

  Problem 1
    - Root composer.json requires PHP extension ext-ftp * but it is missing from your system. Install or enable PHP's ftp extension.

To enable extensions, verify that they are enabled in your .ini files:
    - /usr/local/etc/php/php.ini
    - /usr/local/etc/php/conf.d/docker-php-ext-bcmath.ini
    - /usr/local/etc/php/conf.d/docker-php-ext-gd.ini
    - /usr/local/etc/php/conf.d/docker-php-ext-intl.ini
    - /usr/local/etc/php/conf.d/docker-php-ext-mongodb.ini
    - /usr/local/etc/php/conf.d/docker-php-ext-mysqli.ini
    - /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini
    - /usr/local/etc/php/conf.d/docker-php-ext-pdo_mysql.ini
    - /usr/local/etc/php/conf.d/docker-php-ext-pdo_pgsql.ini
    - /usr/local/etc/php/conf.d/docker-php-ext-soap.ini
    - /usr/local/etc/php/conf.d/docker-php-ext-sodium.ini
    - /usr/local/etc/php/conf.d/docker-php-ext-zip.ini
You can also run `php --ini` in a terminal to see which files are used by PHP in CLI mode.
Alternatively, you can run Composer with `--ignore-platform-req=ext-ftp` to temporarily ignore these required extensions.
```

## Why?

Related to [this change](https://github.com/docker-library/php/issues/1488) in the PHP image used by DO.

`ext-ftp` is no longer installed by default.

> As DO doesn't allow you to install any extensions other than those supplied by default, the only solution is to downgrade the runtime to `php:8.0`