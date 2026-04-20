# SeaTable\Client\AppsApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**changeAppStatus()**](AppsApi.md#changeAppStatus) | **PUT** /api/v2.1/external-apps/{app_token}/status/ | Change App Status |
| [**importUsersToApp()**](AppsApi.md#importUsersToApp) | **POST** /api/v2.1/universal-apps/{app_token}/app-users/batch/ | Import Users to App |
| [**listAppInviteLinks()**](AppsApi.md#listAppInviteLinks) | **GET** /api/v2.1/universal-apps/{app_token}/invite-links/ | List App Invite Links |
| [**listApps()**](AppsApi.md#listApps) | **GET** /api/v2.1/universal-apps/ | List Apps |
| [**listUniversalAppUsers()**](AppsApi.md#listUniversalAppUsers) | **GET** /api/v2.1/universal-apps/{app_token}/app-users/ | List Universal App Users |


## `changeAppStatus()`

```php
changeAppStatus($app_token, $is_inactive)
```

Change App Status

Activate or deactivate a universal app. Pay attention that `true` means the app is inactive. `false` means the app is active.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\AppsApi(
    new GuzzleHttp\Client(),
    $config
);
$app_token = 8254d58e-6a67-45ab-be37-87939d80e99f; // string | The token of the universal app.
$is_inactive = new \SeaTable\Client\User\IsInactive(); // \SeaTable\Client\User\IsInactive

try {
    $apiInstance->changeAppStatus($app_token, $is_inactive);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->changeAppStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_token** | **string**| The token of the universal app. | |
| **is_inactive** | [**\SeaTable\Client\User\IsInactive**](../Model/IsInactive.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

AccountTokenAuth




## `importUsersToApp()`

```php
importUsersToApp($app_token, $import_users_to_app_request)
```

Import Users to App

Imports multiple users to a universal app in a single batch operation.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\AppsApi(
    new GuzzleHttp\Client(),
    $config
);
$app_token = 8254d58e-6a67-45ab-be37-87939d80e99f; // string | The token of the universal app.
$import_users_to_app_request = new \SeaTable\Client\User\ImportUsersToAppRequest(); // \SeaTable\Client\User\ImportUsersToAppRequest

try {
    $apiInstance->importUsersToApp($app_token, $import_users_to_app_request);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->importUsersToApp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_token** | **string**| The token of the universal app. | |
| **import_users_to_app_request** | [**\SeaTable\Client\User\ImportUsersToAppRequest**](../Model/ImportUsersToAppRequest.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

AccountTokenAuth




## `listAppInviteLinks()`

```php
listAppInviteLinks($app_token)
```

List App Invite Links

Lists all invite links for a specific universal app.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\AppsApi(
    new GuzzleHttp\Client(),
    $config
);
$app_token = 8254d58e-6a67-45ab-be37-87939d80e99f; // string | The token of the universal app.

try {
    $apiInstance->listAppInviteLinks($app_token);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->listAppInviteLinks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_token** | **string**| The token of the universal app. | |

### Return type

void (empty response body)

### Authorization

AccountTokenAuth




## `listApps()`

```php
listApps(): object
```

List Apps

Lists all universal apps that you manage or have access to.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\AppsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listApps();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->listApps: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

**object**

### Authorization

AccountTokenAuth




## `listUniversalAppUsers()`

```php
listUniversalAppUsers($app_token)
```

List Universal App Users

Lists all users of a specific universal app.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\AppsApi(
    new GuzzleHttp\Client(),
    $config
);
$app_token = 8254d58e-6a67-45ab-be37-87939d80e99f; // string | The token of the universal app.

try {
    $apiInstance->listUniversalAppUsers($app_token);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->listUniversalAppUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_token** | **string**| The token of the universal app. | |

### Return type

void (empty response body)

### Authorization

AccountTokenAuth



