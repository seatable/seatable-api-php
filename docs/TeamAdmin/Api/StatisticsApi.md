# SeaTable\Client\StatisticsApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAdminLogStatisticsByDay()**](StatisticsApi.md#getAdminLogStatisticsByDay) | **GET** /api/v2.1/org/{org_id}/admin/statistics/admin-logs/by-day/ | Admin Logs (by Day) |
| [**getAutomationLogStatisticsByBase()**](StatisticsApi.md#getAutomationLogStatisticsByBase) | **GET** /api/v2.1/org/{org_id}/admin/statistics/automation-logs/by-base/ | Automation Logs (by Base) |
| [**getAutomationLogStatisticsByDay()**](StatisticsApi.md#getAutomationLogStatisticsByDay) | **GET** /api/v2.1/org/{org_id}/admin/statistics/automation-logs/by-day/ | Automation Logs (by Day) |
| [**getLoginLogStatisticsByDay()**](StatisticsApi.md#getLoginLogStatisticsByDay) | **GET** /api/v2.1/org/{org_id}/admin/statistics/login-logs/by-day/ | Login Logs (by Day) |
| [**getPythonRunStatisticsByBase()**](StatisticsApi.md#getPythonRunStatisticsByBase) | **GET** /api/v2.1/org/{org_id}/admin/statistics/python-runs/by-base/ | Python Runs (by Base) |
| [**getPythonRunStatisticsByDay()**](StatisticsApi.md#getPythonRunStatisticsByDay) | **GET** /api/v2.1/org/{org_id}/admin/statistics/python-runs/by-day/ | Python Runs (by Day) |
| [**getUserOrBaseAIStatistics()**](StatisticsApi.md#getUserOrBaseAIStatistics) | **GET** /api/v2.1/org/{org_id}/admin/statistics/ai/ | Get AI Statistics by User/Base |


## `getAdminLogStatisticsByDay()`

```php
getAdminLogStatisticsByDay($org_id, $start, $end, $page, $per_page): object
```

Admin Logs (by Day)

Returns statistics about admin logs grouped by day.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\StatisticsApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$start = 2025-11-01T06:00:00+01:00; // \DateTime | Start date in ISO format.
$end = 2025-11-30T18:00:00+01:00; // \DateTime | End date in ISO format.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->getAdminLogStatisticsByDay($org_id, $start, $end, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatisticsApi->getAdminLogStatisticsByDay: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **start** | **\DateTime**| Start date in ISO format. | [optional] |
| **end** | **\DateTime**| End date in ISO format. | [optional] |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth




## `getAutomationLogStatisticsByBase()`

```php
getAutomationLogStatisticsByBase($org_id, $start, $end, $page, $per_page): object
```

Automation Logs (by Base)

Returns statistics about automation logs grouped by base.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\StatisticsApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$start = 2025-11-01T06:00:00+01:00; // \DateTime | Start date in ISO format.
$end = 2025-11-30T18:00:00+01:00; // \DateTime | End date in ISO format.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->getAutomationLogStatisticsByBase($org_id, $start, $end, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatisticsApi->getAutomationLogStatisticsByBase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **start** | **\DateTime**| Start date in ISO format. | [optional] |
| **end** | **\DateTime**| End date in ISO format. | [optional] |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth




## `getAutomationLogStatisticsByDay()`

```php
getAutomationLogStatisticsByDay($org_id, $dtable_uuid, $start, $end, $page, $per_page): object
```

Automation Logs (by Day)

Returns statistics about automation logs grouped by day.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\StatisticsApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$dtable_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base.
$start = 2025-11-01T06:00:00+01:00; // \DateTime | Start date in ISO format.
$end = 2025-11-30T18:00:00+01:00; // \DateTime | End date in ISO format.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->getAutomationLogStatisticsByDay($org_id, $dtable_uuid, $start, $end, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatisticsApi->getAutomationLogStatisticsByDay: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **dtable_uuid** | **string**| The unique identifier of a base. | [optional] |
| **start** | **\DateTime**| Start date in ISO format. | [optional] |
| **end** | **\DateTime**| End date in ISO format. | [optional] |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth




## `getLoginLogStatisticsByDay()`

```php
getLoginLogStatisticsByDay($org_id, $start, $end, $page, $per_page): object
```

Login Logs (by Day)

Returns statistics about login logs grouped by day.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\StatisticsApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$start = 2025-11-01T06:00:00+01:00; // \DateTime | Start date in ISO format.
$end = 2025-11-30T18:00:00+01:00; // \DateTime | End date in ISO format.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->getLoginLogStatisticsByDay($org_id, $start, $end, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatisticsApi->getLoginLogStatisticsByDay: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **start** | **\DateTime**| Start date in ISO format. | [optional] |
| **end** | **\DateTime**| End date in ISO format. | [optional] |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth




## `getPythonRunStatisticsByBase()`

```php
getPythonRunStatisticsByBase($org_id, $start, $end, $page, $per_page): object
```

Python Runs (by Base)

Returns statistics about python runs grouped by base.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\StatisticsApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$start = 2025-11-01T06:00:00+01:00; // \DateTime | Start date in ISO format.
$end = 2025-11-30T18:00:00+01:00; // \DateTime | End date in ISO format.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->getPythonRunStatisticsByBase($org_id, $start, $end, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatisticsApi->getPythonRunStatisticsByBase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **start** | **\DateTime**| Start date in ISO format. | [optional] |
| **end** | **\DateTime**| End date in ISO format. | [optional] |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth




## `getPythonRunStatisticsByDay()`

```php
getPythonRunStatisticsByDay($org_id, $dtable_uuid, $start, $end, $page, $per_page): object
```

Python Runs (by Day)

Returns statistics about python runs grouped by day.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\StatisticsApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$dtable_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base.
$start = 2025-11-01T06:00:00+01:00; // \DateTime | Start date in ISO format.
$end = 2025-11-30T18:00:00+01:00; // \DateTime | End date in ISO format.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->getPythonRunStatisticsByDay($org_id, $dtable_uuid, $start, $end, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatisticsApi->getPythonRunStatisticsByDay: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **dtable_uuid** | **string**| The unique identifier of a base. | [optional] |
| **start** | **\DateTime**| Start date in ISO format. | [optional] |
| **end** | **\DateTime**| End date in ISO format. | [optional] |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth




## `getUserOrBaseAIStatistics()`

```php
getUserOrBaseAIStatistics($group_by, $date, $org_id, $page, $per_page): object
```

Get AI Statistics by User/Base

Get AI usage statistics monthly by user/base.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\StatisticsApi(
    new GuzzleHttp\Client(),
    $config
);
$group_by = owner; // string | Query by owner or Base
$date = 2025-01-01; // string | A date string in YYYY-MM-DD format
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->getUserOrBaseAIStatistics($group_by, $date, $org_id, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatisticsApi->getUserOrBaseAIStatistics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_by** | **string**| Query by owner or Base | |
| **date** | **string**| A date string in YYYY-MM-DD format | |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth



