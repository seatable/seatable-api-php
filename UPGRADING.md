# Upgrading

This project is with [Semantic Versioning (2.0.0)](https://semver.org/). This means that for the major version zero anything may change.

Therefore, to ease use already for early versions, upgrade instructions for any such changes can be found in this document for an easy upgrade path.

## From very early Versions

* [New Classname (0.1.0)](#new-classname-010)
* [Curl SSL defaults (0.0.8)](#curl-ssl-defaults-008)
* [Upgrading from the `SeaTableAPI.php` Single Class/File (no version)](#upgrading-from-the-seatableapiphp-single-classfile-no-version)

### New Classname (0.1.0)

If you previously used `SeaTableAPI` and you upgrade to version 0.1.0 or higher, replace it with `SeaTableApi` (lower-case `pi` at the end) from the new namespace `SeaTable\SeaTableApi`.

The use of the old class-name `SeaTableAPI` in the global namespace is deprecated with 0.1.0 and usages of the old class-name emit a deprecation notice ([`E_USER_DEPRECATED`][E_USER_DEPRECATED]) on creation.

[E_USER_DEPRECATED]: https://www.php.net/manual/en/errorfunc.constants.php#errorfunc.constants.errorlevels.e-user-deprecated

Before:

```php
$seatable = new SeaTableAPI([
    'url'       => 'https://cloud.seatable.io',
    'user'      => 'demo@example.com',
    'password'  => 'very-secure-password'
]);
```

After:

```php
use SeaTable\SeaTableApi\SeaTableApi;

$seatable = new SeaTableApi([
    'url'       => 'https://cloud.seatable.io',
    'user'      => 'demo@example.com',
    'password'  => 'very-secure-password'
]);
```

### Curl SSL defaults (0.0.8)

Version 0.0.8 changed to the cUrl library SSL defaults to improve security (and portability) for `CURLOPT_SSL_VERIFYPEER` and `CURLOPT_SSL_VERIFYHOST`.

If you rely on non-default values for these two settings, you can pass them explicitly as options when creating the API class:

```php
$seatable = new SeaTableAPI([
    'http_options' => [
        CURLOPT_SSL_VERIFYPEER => true, // always `false` before 0.0.8
        CURLOPT_SSL_VERIFYHOST => 2,    // always `false` before 0.0.8
    ]
]);
```

### Upgrading from the `SeaTableAPI.php` Single Class/File (no version)

If you previously just copied the `SeaTableAPI.php` file, you can replace it with the `seatable/seatable-api-php` composer package version 0.0.3:

```
composer require seatable/seatable-api-php:0.0.3
```
