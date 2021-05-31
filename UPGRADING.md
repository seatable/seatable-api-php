# Upgrading

This project is with [Semantic Versioning (2.0.0)](https://semver.org/). This means that for the major version zero anything may change.

Therefore, to ease use already for early versions, upgrade instructions for any such changes can be found in this document for an easy upgrade path.

## From very early Versions

* [Curl SSL defaults (0.0.8)](#curl-ssl-defaults-008)
* [Upgrading from the `SeaTableAPI.php` Single Class/File (no version)](#upgrading-from-the-seatableapiphp-single-classfile-no-version)

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
