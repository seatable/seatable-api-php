# SeaTable\Client\BaseInfoApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getBaseInfo()**](BaseInfoApi.md#getBaseInfo) | **GET** /api-gateway/api/v2/dtables/{base_uuid} | Get Base Info |
| [**getMetadata()**](BaseInfoApi.md#getMetadata) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/metadata/ | Get Metadata |
| [**listCollaborators()**](BaseInfoApi.md#listCollaborators) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/related-users/ | List Collaborators |


## `getBaseInfo()`

```php
getBaseInfo($base_uuid): object
```

Get Base Info

Get various information of a base like the tables, (normal and big data) views, links, data statistics and collaborators (currently always empty).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\BaseInfoApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.

try {
    $result = $apiInstance->getBaseInfo($base_uuid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BaseInfoApi->getBaseInfo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |

### Return type

**object**

### Authorization

BaseTokenAuth




## `getMetadata()`

```php
getMetadata($base_uuid): object
```

Get Metadata

Get the complete metadata of a base with all tables, columns and views and settings. The metadata does not contain any data.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\BaseInfoApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.

try {
    $result = $apiInstance->getMetadata($base_uuid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BaseInfoApi->getMetadata: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |

### Return type

**object**

### Authorization

BaseTokenAuth




## `listCollaborators()`

```php
listCollaborators($base_uuid): object
```

List Collaborators

List all collaborators of a base with name, email address and avatar.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\BaseInfoApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.

try {
    $result = $apiInstance->listCollaborators($base_uuid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BaseInfoApi->listCollaborators: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |

### Return type

**object**

### Authorization

BaseTokenAuth



