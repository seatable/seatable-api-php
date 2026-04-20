# SeaTable\Client\BaseTokenApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getBaseTokenWithAccountToken()**](BaseTokenApi.md#getBaseTokenWithAccountToken) | **GET** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/access-token/ | Get Base-Token with Account-Token |
| [**getBaseTokenWithApiToken()**](BaseTokenApi.md#getBaseTokenWithApiToken) | **GET** /api/v2.1/dtable/app-access-token/ | Get Base-Token with API-Token |


## `getBaseTokenWithAccountToken()`

```php
getBaseTokenWithAccountToken($workspace_id, $base_name, $exp): \SeaTable\Client\Auth\AccessToken
```

Get Base-Token with Account-Token

Generate a Base-Token using the user's Account-Token. The read/write permission depends on the user's access permissions to the base.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer (Account-Token) authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\Auth\BaseTokenApi(
    new GuzzleHttp\Client(),
    $config
);
$workspace_id = 127; // int | The id of the workspace. For an explanation how to get the *workspace_id*, check out this [help-article](https://seatable.com/help/find-workspace-id-group/).  Alternatively the API endpoint [get metadata](/reference/getmetadata) can be used.
$base_name = My Projects; // string | The name of your base.
$exp = '3d'; // string | Expiration time of the generated access token. Examples: 5h (= 5 hours) or 3d (= 3 days)

try {
    $result = $apiInstance->getBaseTokenWithAccountToken($workspace_id, $base_name, $exp);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BaseTokenApi->getBaseTokenWithAccountToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **workspace_id** | **int**| The id of the workspace. For an explanation how to get the *workspace_id*, check out this [help-article](https://seatable.com/help/find-workspace-id-group/).  Alternatively the API endpoint [get metadata](/reference/getmetadata) can be used. | |
| **base_name** | **string**| The name of your base. | |
| **exp** | **string**| Expiration time of the generated access token. Examples: 5h (&#x3D; 5 hours) or 3d (&#x3D; 3 days) | [optional] [default to &#39;3d&#39;] |

### Return type

[**\SeaTable\Client\Auth\AccessToken**](../Model/AccessToken.md)

### Authorization

AccountTokenAuth




## `getBaseTokenWithApiToken()`

```php
getBaseTokenWithApiToken($exp): \SeaTable\Client\Auth\GetBaseTokenWithApiToken200Response
```

Get Base-Token with API-Token

Generate a Base-Token with an API-Token. The API-Token grants either read or write permission to this base, depending of the permission of the API-Token.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer (API-Token) authorization: ApiTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\Auth\BaseTokenApi(
    new GuzzleHttp\Client(),
    $config
);
$exp = '3d'; // string | Expiration time of the generated access token. Examples: 5h (= 5 hours) or 3d (= 3 days)

try {
    $result = $apiInstance->getBaseTokenWithApiToken($exp);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BaseTokenApi->getBaseTokenWithApiToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **exp** | **string**| Expiration time of the generated access token. Examples: 5h (&#x3D; 5 hours) or 3d (&#x3D; 3 days) | [optional] [default to &#39;3d&#39;] |

### Return type

[**\SeaTable\Client\Auth\GetBaseTokenWithApiToken200Response**](../Model/GetBaseTokenWithApiToken200Response.md)

### Authorization

ApiTokenAuth



