# SeaTable API PHP Client

This is the official **SeaTable PHP client**, generated with [OpenAPI Generator](https://openapi-generator.tech/).

The SeaTable PHP client provides access to all publicly available API endpoints, allowing you to interact with user accounts, bases, and files.

## Installation

To install the SeaTable PHP client, you can use Composer:

```
composer require seatable/seatable-api-php
```

## Usage

You can find a comprehensive list of all available endpoints and methods in the `README_xxx.md` files within this repository.

## Authentication

Authentication is managed via authentication-header. For more information on obtaining and using access tokens, refer to the [Authentication at SeaTable](https://api.seatable.io/reference/authentication).

## Resources:

Additional resources and documentation that might help you are available at:

- [SeaTable Developer Manual](https://developer.seatable.io/clients/php_api/)
- [SeaTable API Reference](https://api.seatable.io)
- [SeaTable OpenApi Specification](https://github.com/seatable/openapi)
- [Packagist](https://packagist.org/packages/seatable/seatable-api-php)

## Versioning

The SeaTable PHP client follows the versioning of the SeaTable OpenAPI specification for the major and minor versions.

With each new minor version of SeaTable, the OpenAPI Specification is updated and a corresponding client version is published here. For instance, if you are using SeaTable Server v4.4.x, you should use the SeaTable PHP client v4.4.x to ensure compatibility with all available endpoints.

## Questions and Problems

We have disabled issue creation in this repository. Please direct your questions and report any issues on the [SeaTable Community Forum](https://forum.seatable.io). This approach ensures a more centralized and efficient support experience for all users.

## Build Errors

The `./generate_api.sh` script produce errors such as `[main] ERROR o.o.codegen.DefaultCodegen - Required var column_data not in properties`.
These errors are due to [this issue](https://github.com/OpenAPITools/openapi-generator/issues/17863) and can be safely ignored as they do not affect the functionality of the client.
