# SeaTable\Client\ActivitiesLogsApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getBaseActivities()**](ActivitiesLogsApi.md#getBaseActivities) | **GET** /api/v2.1/dtable-activities/ | Get Base Activities |
| [**getBaseActivityDetails()**](ActivitiesLogsApi.md#getBaseActivityDetails) | **GET** /api/v2.1/dtable-activities/detail | Get Base Activity Details |
| [**getBigDataOperationLogs()**](ActivitiesLogsApi.md#getBigDataOperationLogs) | **GET** /api/v2.1/dtables/{base_uuid}/big-data-operation-logs/ | Get Big Data Operation Logs |


## `getBaseActivities()`

```php
getBaseActivities($page, $per_page, $to_tz): object
```

Get Base Activities

List the user's base activities in the past week.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\User\ActivitiesLogsApi(
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$per_page = 2; // int
$to_tz = +08:00; // string

try {
    $result = $apiInstance->getBaseActivities($page, $per_page, $to_tz);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesLogsApi->getBaseActivities: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] |
| **per_page** | **int**|  | [optional] |
| **to_tz** | **string**|  | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth




## `getBaseActivityDetails()`

```php
getBaseActivityDetails($dtable_uuid, $op_date, $page, $per_page): object
```

Get Base Activity Details

List all activities of one specific base.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\User\ActivitiesLogsApi(
    new GuzzleHttp\Client(),
    $config
);
$dtable_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$op_date = 2023-05-25T10:06:39+08:00; // string
$page = 1; // int
$per_page = 2; // int

try {
    $result = $apiInstance->getBaseActivityDetails($dtable_uuid, $op_date, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesLogsApi->getBaseActivityDetails: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **dtable_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **op_date** | **string**|  | |
| **page** | **int**|  | [optional] |
| **per_page** | **int**|  | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth




## `getBigDataOperationLogs()`

```php
getBigDataOperationLogs($base_uuid, $page, $per_page): \SeaTable\Client\User\GetBigDataOperationLogs200Response
```

Get Big Data Operation Logs

Fetches big data operation logs for a specified base identified by its base_uuid. Every page returns 100 entries by default.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\User\ActivitiesLogsApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$page = 1; // int
$per_page = 2; // int

try {
    $result = $apiInstance->getBigDataOperationLogs($base_uuid, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesLogsApi->getBigDataOperationLogs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **page** | **int**|  | [optional] |
| **per_page** | **int**|  | [optional] |

### Return type

[**\SeaTable\Client\User\GetBigDataOperationLogs200Response**](../Model/GetBigDataOperationLogs200Response.md)

### Authorization

AccountTokenAuth



