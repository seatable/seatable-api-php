# Upgrading

This project is with [Semantic Versioning (2.0.0)](https://semver.org/). This means that for the major version zero anything may change.

Therefore, to ease use already for early versions, upgrade instructions for any such changes can be found in this document for an easy upgrade path.

## From very early Versions

* [Removal of `SeaTableAPI::debug()` (0.1.7)](#removal-of-seatableapidebug-017)
* [New Classname (0.1.0)](#new-classname-010)
* [Curl SSL defaults (0.0.8)](#curl-ssl-defaults-008)
* [Upgrading from the `SeaTableAPI.php` Single Class/File (no version)](#upgrading-from-the-seatableapiphp-single-classfile-no-version)
* [Deprecations (0.x.x)](#deprecations-0xx)
* [Public Interface](#public-interface)

### Removal of `SeaTableAPI::debug()` (0.1.7)

The in 0.0.4 deprecated `SeaTableAPI::debug()` method has been removed in 0.1.7.

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

### Deprecations (0.x.x)

For early versions, deprecations in the public interface are introduced not in minor but in patch versions. There is at least one patch version with the deprecation, and removal will not be before that patch version.

Deprecations are `@deprecated` annotated and should trigger an `E_USER_DEPRECATED` error so that deprecations can be easily tracked while using.

It then normally takes a couple of patch releases until a deprecated part of the public interface is fully removed.

But note this must not necessarily be more than zero more patch releases and especially not a new minor release.

However, expect the next minor release to not have the deprecated functionality any longer. In case it contains deprecation warnings from a previous minor release, expect it to not have the deprecated functionality any longer, the warning does not safeguard anything.

To safely upgrade, test against your usage pattern with each patch version and handle the deprecations as early as possible.

### Public Interface

Parts of the API marked as `@internal` are not part of the public interface and can change in any (patch) release.

Parameters and return values in the public interface are still volatile and therefore not every of their properties can be easily guarded by deprecation warnings (or the PHP language itself).

Even we do not take breaking changes lightly, please consider the following, more detailed information:

#### Types of Parameters / Return Types

If type-information for a parameter or a return value changes, the previous type-information unmatched by the change is considered deprecated, but not necessarily with a deprecation warning (for return-type-information a deprecation warning would likely not be useful if even possible).

Run a type-checker to detect any issues with each patch release to be on the safe side:

Changes in the signature (that have their effect with `declare(strict_types=1)`) are not introduced in the same patch release unless the signature itself already contained the type-information for that parameter.

That is before more strict and binding type-information is added, the information is annotated first.

However, as the library uses `declare(strict_types=1)` internally, type errors may surface already earlier. Therefore, we suggest using the library with `declare(strict_types=1)` to narrow potential type related problems already when using the library.

#### Named Parameters

Calling any method or function of the public interface with named parameters (PHP 8.0+) is considered undefined behaviour.

That is, it does not fall into any backward compatibility promise of any kind.
