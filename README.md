# seatable-api-php

This is the official "SeaTable php client", which was auto generated with [OpenAPI Generator](https://openapi-generator.tech/).

This SeaTable php client contains all public available API endpoints to interact with the user accounts, bases or files.

## Resources:

- [Documentation](https://developer.seatable.io/clients/php_api/)
- [SeaTable API Reference](https://api.seatable.io)
- [SeaTable OpenApi Specification](https://github.com/seatable/openapi)
- Report Issues at the [Community Forum](https://forum.seatable.io)

## Versioning

The SeaTable php client follows the versioning of the SeaTable OpenApi specification. With every new version of
SeaTable, the SeaTable OpenAPI Specification will be updated and a new client with the same version will be published here.
The client will contain all available endpoints of the specification.

## Build Errors

The `./generate_api.sh` script causes quite a lot of errors such as `[main] ERROR o.o.codegen.DefaultCodegen - Required var column_data not in properties`.
They are caused by https://github.com/OpenAPITools/openapi-generator/issues/17863, which does not have a fix yet.
The errors do not cause any problems and can be ignored.
