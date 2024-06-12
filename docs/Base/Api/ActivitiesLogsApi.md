# SeaTable\Client\ActivitiesLogsApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getBaseActivityLog()**](ActivitiesLogsApi.md#getBaseActivityLog) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/operations/ | Get Base Activity Log |
| [**listDeleteOperations()**](ActivitiesLogsApi.md#listDeleteOperations) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/deleted-rows/ | List Deleted Operations |
| [**listRowActivities()**](ActivitiesLogsApi.md#listRowActivities) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/activities/ | List Row Activities |


## `getBaseActivityLog()`

```php
getBaseActivityLog($base_uuid, $page): object
```

Get Base Activity Log

Get the activities log in a base. With the base's `base_uuid`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\ActivitiesLogsApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.

try {
    $result = $apiInstance->getBaseActivityLog($base_uuid, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesLogsApi->getBaseActivityLog: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `listDeleteOperations()`

```php
listDeleteOperations($base_uuid): object
```

List Deleted Operations

List all the deleted rows in the last 7 days. If you are looking for rows deleted before that, you can view a snapshot of this base.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\ActivitiesLogsApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.

try {
    $result = $apiInstance->listDeleteOperations($base_uuid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesLogsApi->listDeleteOperations: ', $e->getMessage(), PHP_EOL;
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




## `listRowActivities()`

```php
listRowActivities($row_id, $base_uuid, $page, $per_page): object
```

List Row Activities

List all the activities done to a certain row with the row's `row_id`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\ActivitiesLogsApi(
    new GuzzleHttp\Client(),
    $config
);
$row_id = YMIviMeERQCUiQhPPqo6Gw; // string | Unique id of a row.
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->listRowActivities($row_id, $base_uuid, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesLogsApi->listRowActivities: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **row_id** | **string**| Unique id of a row. | |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth



