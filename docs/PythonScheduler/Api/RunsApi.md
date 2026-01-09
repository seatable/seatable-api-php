# SeaTable\Client\RunsApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**listRuns()**](RunsApi.md#listRuns) | **GET** /admin/runs/ | List Runs |


## `listRuns()`

```php
listRuns($org_id, $base_uuid, $start, $end, $page, $per_page): object
```

List Runs

> 📘 Requires Self-Hosted Installation > > This endpoint requires a Python-Scheduler-Token, which can only be retrieved by the system administrator. > Therefore this endpoint cannot be used with SeaTable Cloud.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: PythonSchedulerAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\PythonScheduler\RunsApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of the team/organization.
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$start = 2025-11-01T06:00:00+01:00; // \DateTime | Start date in ISO format.
$end = 2025-11-30T18:00:00+01:00; // \DateTime | End date in ISO format.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->listRuns($org_id, $base_uuid, $start, $end, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RunsApi->listRuns: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of the team/organization. | [optional] |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | [optional] |
| **start** | **\DateTime**| Start date in ISO format. | [optional] |
| **end** | **\DateTime**| End date in ISO format. | [optional] |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

PythonSchedulerAuth



