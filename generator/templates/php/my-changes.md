# api.mustache
- Set `$multipart` to `true` if `Content-Type` is `multipart/form-data`

# api_doc.mustace

in line 43 I replaces \API\ with {{apiPackage}}.

```
New:
$apiInstance = new {{apiPackage}}\{{classname}}(
```

Back to top - only.

# ObjectSerializer.mustache
- Explicitly check against all `ModelInterface` interfaces (since we're generating one interface per .yaml file)

# partial_header.mustache

- Removed `Generator version: {{{generatorVersion}}}` (https://github.com/OpenAPITools/openapi-generator/blob/ef7654958e4d68371b3b19610917f0da96ec7670/modules/openapi-generator/src/main/resources/php/partial_header.mustache)

# README.mustache

nur base paths und neue headline...
- Removed `Generator version`
