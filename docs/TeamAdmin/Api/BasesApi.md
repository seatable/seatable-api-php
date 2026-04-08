# SeaTable\Client\BasesApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**clearTeamTrashBin()**](BasesApi.md#clearTeamTrashBin) | **DELETE** /api/v2.1/org/{org_id}/admin/trash-dtables/ | Clear Team Trash Bin |
| [**deleteApiToken()**](BasesApi.md#deleteApiToken) | **DELETE** /api/v2.1/org/{org_id}/admin/dtables/{base_uuid}/api-tokens/{app_name}/ | Delete API-Token |
| [**deleteBase()**](BasesApi.md#deleteBase) | **DELETE** /api/v2.1/org/{org_id}/admin/dtables/{base_uuid}/ | Delete Base |
| [**getBase()**](BasesApi.md#getBase) | **GET** /api/v2.1/org/{org_id}/admin/dtables/{base_uuid}/ | Get Base |
| [**listApiTokens()**](BasesApi.md#listApiTokens) | **GET** /api/v2.1/org/{org_id}/admin/dtables/{base_uuid}/api-tokens/ | List API-Tokens |
| [**listApiTokensOfAllBases()**](BasesApi.md#listApiTokensOfAllBases) | **GET** /api/v2.1/org/{org_id}/admin/api-tokens/ | List API-Tokens of All Bases |
| [**listBaseSharings()**](BasesApi.md#listBaseSharings) | **GET** /api/v2.1/org/{org_id}/admin/dtables/{base_uuid}/shares/ | List Base Sharings |
| [**listBases()**](BasesApi.md#listBases) | **GET** /api/v2.1/org/{org_id}/admin/dtables/ | List Bases (Team) |
| [**listTrashBases()**](BasesApi.md#listTrashBases) | **GET** /api/v2.1/org/{org_id}/admin/trash-dtables/ | List Trash Bases |
| [**listUsersBases()**](BasesApi.md#listUsersBases) | **GET** /api/v2.1/org/{org_id}/admin/users/{user_id}/dtables/ | List User&#39;s Bases |
| [**restoreBaseFromTrash()**](BasesApi.md#restoreBaseFromTrash) | **PUT** /api/v2.1/org/{org_id}/admin/trash-dtables/{base_uuid}/ | Restore Base from Trash |
| [**searchBase()**](BasesApi.md#searchBase) | **GET** /api/v2.1/org/{org_id}/admin/search-dtables/ | Search Base |


## `clearTeamTrashBin()`

```php
clearTeamTrashBin($org_id): object
```

Clear Team Trash Bin

Clear the team trash bin. All the bases there will be removed permanently and cannot be restored any more.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\BasesApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.

try {
    $result = $apiInstance->clearTeamTrashBin($org_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BasesApi->clearTeamTrashBin: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |

### Return type

**object**

### Authorization

AccountTokenAuth




## `deleteApiToken()`

```php
deleteApiToken($org_id, $base_uuid, $app_name): object
```

Delete API-Token

Delete a specific API token from a base. The token is identified by its *app_name*.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\BasesApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$app_name = My App; // string | The name of your app. Every API-Token has a name to identify the purpose. The name of the app must be unique for every base.

try {
    $result = $apiInstance->deleteApiToken($org_id, $base_uuid, $app_name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BasesApi->deleteApiToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **app_name** | **string**| The name of your app. Every API-Token has a name to identify the purpose. The name of the app must be unique for every base. | |

### Return type

**object**

### Authorization

AccountTokenAuth




## `deleteBase()`

```php
deleteBase($org_id, $base_uuid): object
```

Delete Base

Delete a base. This base will be put into the organization's trash bin, and permanently deleted automatically after 30 days.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\BasesApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.

try {
    $result = $apiInstance->deleteBase($org_id, $base_uuid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BasesApi->deleteBase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |

### Return type

**object**

### Authorization

AccountTokenAuth




## `getBase()`

```php
getBase($org_id, $base_uuid): \SeaTable\Client\TeamAdmin\GetBase200Response
```

Get Base

Get the details of a base in a team

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\BasesApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.

try {
    $result = $apiInstance->getBase($org_id, $base_uuid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BasesApi->getBase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |

### Return type

[**\SeaTable\Client\TeamAdmin\GetBase200Response**](../Model/GetBase200Response.md)

### Authorization

AccountTokenAuth




## `listApiTokens()`

```php
listApiTokens($org_id, $base_uuid): object
```

List API-Tokens

List API tokens of a single base.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\BasesApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.

try {
    $result = $apiInstance->listApiTokens($org_id, $base_uuid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BasesApi->listApiTokens: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |

### Return type

**object**

### Authorization

AccountTokenAuth




## `listApiTokensOfAllBases()`

```php
listApiTokensOfAllBases($org_id, $page, $per_page): object
```

List API-Tokens of All Bases

List API tokens of all bases inside the team/organization.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\BasesApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->listApiTokensOfAllBases($org_id, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BasesApi->listApiTokensOfAllBases: ', $e->getMessage(), PHP_EOL;
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




## `listBaseSharings()`

```php
listBaseSharings($org_id, $base_uuid): object
```

List Base Sharings

Use this request to list all the users and groups that a base is being shared with.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\BasesApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.

try {
    $result = $apiInstance->listBaseSharings($org_id, $base_uuid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BasesApi->listBaseSharings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |

### Return type

**object**

### Authorization

AccountTokenAuth




## `listBases()`

```php
listBases($org_id, $page, $per_page): object
```

List Bases (Team)

List all the bases in the current organization.  The returned `id` value is the ID of the base, to be distinguished from the base's `base_uuid`. Details see the **SeaTable API Parameter Reference**.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\BasesApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->listBases($org_id, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BasesApi->listBases: ', $e->getMessage(), PHP_EOL;
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




## `listTrashBases()`

```php
listTrashBases($org_id, $page, $per_page): object
```

List Trash Bases

List the bases in the organization's trash bin.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\BasesApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->listTrashBases($org_id, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BasesApi->listTrashBases: ', $e->getMessage(), PHP_EOL;
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




## `listUsersBases()`

```php
listUsersBases($org_id, $user_id, $page, $per_page): object
```

List User's Bases

List all the bases of a certain user by the user's ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\BasesApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$user_id = 123456789f1e4c8d8e1c31415867317c@auth.local; // string | The unique `user_id` in the form ...@auth.local. This is not the email address of the user.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->listUsersBases($org_id, $user_id, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BasesApi->listUsersBases: ', $e->getMessage(), PHP_EOL;
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




## `restoreBaseFromTrash()`

```php
restoreBaseFromTrash($org_id, $base_uuid): object
```

Restore Base from Trash

Restore a base from the trash bin.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\BasesApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.

try {
    $result = $apiInstance->restoreBaseFromTrash($org_id, $base_uuid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BasesApi->restoreBaseFromTrash: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |

### Return type

**object**

### Authorization

AccountTokenAuth




## `searchBase()`

```php
searchBase($org_id, $query): object
```

Search Base

By giving the exact or fuzzy match of the name of a base, you can find a base or all the bases that fit to that search criteria. The search is case-insensitive.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\TeamAdmin\BasesApi(
    new GuzzleHttp\Client(),
    $config
);
$org_id = 1; // int | The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin.
$query = Example; // string | Exact name or a part of the name of the base, case insensitive.

try {
    $result = $apiInstance->searchBase($org_id, $query);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BasesApi->searchBase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **org_id** | **int**| The ID of your team/organization. Numeric. Get it from [Get Team](/reference/getteaminfo). Contact your team admin, if you are not the admin. | |
| **query** | **string**| Exact name or a part of the name of the base, case insensitive. | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth



