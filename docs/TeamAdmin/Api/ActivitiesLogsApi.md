# SeaTable\Client\ActivitiesLogsApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**listAutomationLogs()**](ActivitiesLogsApi.md#listAutomationLogs) | **GET** /api/v2.1/org/{org_id}/admin/automation-logs/ | List Automation Logs |
| [**listFileAccessLogs()**](ActivitiesLogsApi.md#listFileAccessLogs) | **GET** /api/v2.1/org/{org_id}/admin/file-access-logs/ | List File Access Logs |
| [**listGroupMemberAuditLogs()**](ActivitiesLogsApi.md#listGroupMemberAuditLogs) | **GET** /api/v2.1/org/{org_id}/admin/group-member-audit/ | List Group Member Audit Logs |
| [**listPythonRuns()**](ActivitiesLogsApi.md#listPythonRuns) | **GET** /api/v2.1/org/{org_id}/admin/python-runs/ | List Python Runs |
| [**listTeamLogins()**](ActivitiesLogsApi.md#listTeamLogins) | **GET** /api/v2.1/org/{org_id}/admin/login-logs/ | List Team Logins |
| [**listTeamOperationLog()**](ActivitiesLogsApi.md#listTeamOperationLog) | **GET** /api/v2.1/org/{org_id}/admin/admin-logs/ | List Team Operations |
| [**listUserLogins()**](ActivitiesLogsApi.md#listUserLogins) | **GET** /api/v2.1/org/{org_id}/admin/login-logs/{user_id}/ | List User Logins |


## `listAutomationLogs()`

```php
listAutomationLogs($org_id, $dtable_uuid, $start, $end, $page, $per_page): object
```

List Automation Logs

Returns a list of automation logs inside a specific team.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\ActivitiesLogsApi(
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
    $result = $apiInstance->listAutomationLogs($org_id, $dtable_uuid, $start, $end, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesLogsApi->listAutomationLogs: ', $e->getMessage(), PHP_EOL;
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




## `listFileAccessLogs()`

```php
listFileAccessLogs($org_id, $page, $per_page): object
```

List File Access Logs

Returns a list of accessed files inside a specific team.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\ActivitiesLogsApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->listFileAccessLogs($org_id, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesLogsApi->listFileAccessLogs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth




## `listGroupMemberAuditLogs()`

```php
listGroupMemberAuditLogs($org_id, $page, $per_page): object
```

List Group Member Audit Logs

Retrieves audit logs for changes to group members (either `group_member_add` or `group_member_delete`).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\ActivitiesLogsApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->listGroupMemberAuditLogs($org_id, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesLogsApi->listGroupMemberAuditLogs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth




## `listPythonRuns()`

```php
listPythonRuns($org_id, $dtable_uuid, $start, $end, $page, $per_page): object
```

List Python Runs

Returns a list of python runs inside a specific team.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\ActivitiesLogsApi(
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
    $result = $apiInstance->listPythonRuns($org_id, $dtable_uuid, $start, $end, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesLogsApi->listPythonRuns: ', $e->getMessage(), PHP_EOL;
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




## `listTeamLogins()`

```php
listTeamLogins($org_id, $page, $per_page, $status, $start, $end): object
```

List Team Logins

Retrieves the login activities of all team members.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\ActivitiesLogsApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.
$status = success; // string | Set this to `success` to only return successful logins. By default, all logins are returned.
$start = 2025-11-01T06:00:00+01:00; // \DateTime | Start date in ISO format.
$end = 2025-11-30T18:00:00+01:00; // \DateTime | End date in ISO format.

try {
    $result = $apiInstance->listTeamLogins($org_id, $page, $per_page, $status, $start, $end);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesLogsApi->listTeamLogins: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |
| **status** | **string**| Set this to &#x60;success&#x60; to only return successful logins. By default, all logins are returned. | [optional] |
| **start** | **\DateTime**| Start date in ISO format. | [optional] |
| **end** | **\DateTime**| End date in ISO format. | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth




## `listTeamOperationLog()`

```php
listTeamOperationLog($org_id, $page, $per_page, $operation_group, $start, $end): object
```

List Team Operations

Retrieves the operation log of all team members.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\ActivitiesLogsApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.
$operation_group = user; // string | Filter by a specific operation group. By default, all operations are returned.
$start = 2025-11-01T06:00:00+01:00; // \DateTime | Start date in ISO format.
$end = 2025-11-30T18:00:00+01:00; // \DateTime | End date in ISO format.

try {
    $result = $apiInstance->listTeamOperationLog($org_id, $page, $per_page, $operation_group, $start, $end);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesLogsApi->listTeamOperationLog: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |
| **operation_group** | **string**| Filter by a specific operation group. By default, all operations are returned. | [optional] |
| **start** | **\DateTime**| Start date in ISO format. | [optional] |
| **end** | **\DateTime**| End date in ISO format. | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth




## `listUserLogins()`

```php
listUserLogins($org_id, $user_id, $page, $per_page): object
```

List User Logins

Returns the login activities of one specific team member.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\ActivitiesLogsApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$user_id = 123456789f1e4c8d8e1c31415867317c@auth.local; // string | The unique `user_id` in the form ...@auth.local. This is not the email address of the user.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->listUserLogins($org_id, $user_id, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesLogsApi->listUserLogins: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **user_id** | **string**| The unique &#x60;user_id&#x60; in the form ...@auth.local. This is not the email address of the user. | |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth



