# SeaTable\Client\StatisticsApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getStatisticsGroupedByBase()**](StatisticsApi.md#getStatisticsGroupedByBase) | **GET** /admin/statistics/by-base/ | Grouped by Base |
| [**getStatisticsGroupedByDay()**](StatisticsApi.md#getStatisticsGroupedByDay) | **GET** /admin/statistics/by-day/ | Grouped by Day |
| [**scriptRunsPerBase()**](StatisticsApi.md#scriptRunsPerBase) | **GET** /admin/statistics/scripts-running/by-base/ | Script runs per base |
| [**scriptRunsPerTeam()**](StatisticsApi.md#scriptRunsPerTeam) | **GET** /admin/statistics/scripts-running/by-org/ | Script runs per team |
| [**scriptRunsPerUser()**](StatisticsApi.md#scriptRunsPerUser) | **GET** /admin/statistics/scripts-running/by-user/ | Script runs per user |


## `getStatisticsGroupedByBase()`

```php
getStatisticsGroupedByBase($org_id, $start, $end, $page, $per_page): object
```

Grouped by Base

> 📘 Requires Self-Hosted Installation > > This endpoint requires a Python-Scheduler-Token, which can only be retrieved by the system administrator. > Therefore this endpoint cannot be used with SeaTable Cloud.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: PythonSchedulerAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\PythonScheduler\StatisticsApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of the team/organization.
$start = 2025-11-01T06:00:00+01:00; // \DateTime | Start date in ISO format.
$end = 2025-11-30T18:00:00+01:00; // \DateTime | End date in ISO format.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->getStatisticsGroupedByBase($org_id, $start, $end, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatisticsApi->getStatisticsGroupedByBase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of the team/organization. | [optional] |
| **start** | **\DateTime**| Start date in ISO format. | [optional] |
| **end** | **\DateTime**| End date in ISO format. | [optional] |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

PythonSchedulerAuth




## `getStatisticsGroupedByDay()`

```php
getStatisticsGroupedByDay($org_id, $base_uuid, $start, $end, $page, $per_page): object
```

Grouped by Day

> 📘 Requires Self-Hosted Installation > > This endpoint requires a Python-Scheduler-Token, which can only be retrieved by the system administrator. > Therefore this endpoint cannot be used with SeaTable Cloud.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: PythonSchedulerAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\PythonScheduler\StatisticsApi(
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
    $result = $apiInstance->getStatisticsGroupedByDay($org_id, $base_uuid, $start, $end, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatisticsApi->getStatisticsGroupedByDay: ', $e->getMessage(), PHP_EOL;
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




## `scriptRunsPerBase()`

```php
scriptRunsPerBase($month, $order_by, $direction, $page, $per_page): object
```

Script runs per base

> 📘 Requires Self-Hosted Installation > > This endpoint requires a Python-Scheduler-Token, which can only be retrieved by the system administrator. > Therefore this endpoint cannot be used with SeaTable Cloud.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: PythonSchedulerAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\PythonScheduler\StatisticsApi(
    new GuzzleHttp\Client(),
    $config
);
$month = 2023-06; // string | For which month you'd like to list the statistics in the format of YYYY-MM. If you leave this value empty,
$order_by = total_run_count; // string | Select the parameter to order the results.
$direction = desc; // string | The direction of the sort, ascending `asc` or descending `desc`. asc by default. Direction requires that `order_by` is set.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->scriptRunsPerBase($month, $order_by, $direction, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatisticsApi->scriptRunsPerBase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **month** | **string**| For which month you&#39;d like to list the statistics in the format of YYYY-MM. If you leave this value empty, | [optional] |
| **order_by** | **string**| Select the parameter to order the results. | [optional] [default to &#39;&#39;] |
| **direction** | **string**| The direction of the sort, ascending &#x60;asc&#x60; or descending &#x60;desc&#x60;. asc by default. Direction requires that &#x60;order_by&#x60; is set. | [optional] [default to &#39;&#39;] |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

PythonSchedulerAuth




## `scriptRunsPerTeam()`

```php
scriptRunsPerTeam($month, $order_by, $direction, $page, $per_page): object
```

Script runs per team

> 📘 Requires Self-Hosted Installation > > This endpoint requires a Python-Scheduler-Token, which can only be retrieved by the system administrator. > Therefore this endpoint cannot be used with SeaTable Cloud.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: PythonSchedulerAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\PythonScheduler\StatisticsApi(
    new GuzzleHttp\Client(),
    $config
);
$month = 2023-06; // string | For which month you'd like to list the statistics in the format of YYYY-MM. If you leave this value empty,
$order_by = total_run_count; // string | Select the parameter to order the results.
$direction = desc; // string | The direction of the sort, ascending `asc` or descending `desc`. asc by default. Direction requires that `order_by` is set.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->scriptRunsPerTeam($month, $order_by, $direction, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatisticsApi->scriptRunsPerTeam: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **month** | **string**| For which month you&#39;d like to list the statistics in the format of YYYY-MM. If you leave this value empty, | [optional] |
| **order_by** | **string**| Select the parameter to order the results. | [optional] [default to &#39;&#39;] |
| **direction** | **string**| The direction of the sort, ascending &#x60;asc&#x60; or descending &#x60;desc&#x60;. asc by default. Direction requires that &#x60;order_by&#x60; is set. | [optional] [default to &#39;&#39;] |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

PythonSchedulerAuth




## `scriptRunsPerUser()`

```php
scriptRunsPerUser($month, $order_by, $direction, $page, $per_page): object
```

Script runs per user

> 📘 Requires Self-Hosted Installation > > This endpoint requires a Python-Scheduler-Token, which can only be retrieved by the system administrator. > Therefore this endpoint cannot be used with SeaTable Cloud.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: PythonSchedulerAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\PythonScheduler\StatisticsApi(
    new GuzzleHttp\Client(),
    $config
);
$month = 2023-06; // string | For which month you'd like to list the statistics in the format of YYYY-MM. If you leave this value empty,
$order_by = total_run_count; // string | Select the parameter to order the results.
$direction = desc; // string | The direction of the sort, ascending `asc` or descending `desc`. asc by default. Direction requires that `order_by` is set.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->scriptRunsPerUser($month, $order_by, $direction, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatisticsApi->scriptRunsPerUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **month** | **string**| For which month you&#39;d like to list the statistics in the format of YYYY-MM. If you leave this value empty, | [optional] |
| **order_by** | **string**| Select the parameter to order the results. | [optional] [default to &#39;&#39;] |
| **direction** | **string**| The direction of the sort, ascending &#x60;asc&#x60; or descending &#x60;desc&#x60;. asc by default. Direction requires that &#x60;order_by&#x60; is set. | [optional] [default to &#39;&#39;] |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

PythonSchedulerAuth



