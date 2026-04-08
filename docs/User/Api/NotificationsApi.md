# SeaTable\Client\NotificationsApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addNotificationRule()**](NotificationsApi.md#addNotificationRule) | **POST** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/notification-rules/ | Add Notification Rule |
| [**deleteNotificationRule()**](NotificationsApi.md#deleteNotificationRule) | **DELETE** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/notification-rules/{notification_rule_id}/ | Delete Notification Rule |
| [**listNotificationRules()**](NotificationsApi.md#listNotificationRules) | **GET** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/notification-rules/ | List Notification Rules |
| [**markNotificationAsSeen()**](NotificationsApi.md#markNotificationAsSeen) | **DELETE** /api/v2.1/notifications/ | Mark Notifications As Seen |
| [**updateNotificationRule()**](NotificationsApi.md#updateNotificationRule) | **PUT** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/notification-rules/{notification_rule_id}/ | Update Notification Rule |


## `addNotificationRule()`

```php
addNotificationRule($workspace_id, $base_name, $add_notification_rule_request): \SeaTable\Client\User\AddNotificationRule200Response
```

Add Notification Rule

Use this request to add a new notification rule for a base.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\NotificationsApi(
    new GuzzleHttp\Client(),
    $config
);
$workspace_id = 127; // int | id of your workspace.
$base_name = My Projects; // string | name of your base.
$add_notification_rule_request = new \SeaTable\Client\User\AddNotificationRuleRequest(); // \SeaTable\Client\User\AddNotificationRuleRequest

try {
    $result = $apiInstance->addNotificationRule($workspace_id, $base_name, $add_notification_rule_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NotificationsApi->addNotificationRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **workspace_id** | **int**| id of your workspace. | |
| **base_name** | **string**| name of your base. | |
| **add_notification_rule_request** | [**\SeaTable\Client\User\AddNotificationRuleRequest**](../Model/AddNotificationRuleRequest.md)|  | |

### Return type

[**\SeaTable\Client\User\AddNotificationRule200Response**](../Model/AddNotificationRule200Response.md)

### Authorization

AccountTokenAuth




## `deleteNotificationRule()`

```php
deleteNotificationRule($workspace_id, $base_name, $notification_rule_id): object
```

Delete Notification Rule

Delete an existing notification rule.  The `notification_rule_id` is the ID of the notification to be deleted. This can be retrieved by [List Notification Rules](/reference/listnotificationrules-1) or can be seen when you [Add Base Notification Rule](/reference/addnotificationrule).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\NotificationsApi(
    new GuzzleHttp\Client(),
    $config
);
$workspace_id = 127; // int | id of your workspace.
$base_name = My Projects; // string | name of your base.
$notification_rule_id = 1; // string | The ID of the notification rule.

try {
    $result = $apiInstance->deleteNotificationRule($workspace_id, $base_name, $notification_rule_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NotificationsApi->deleteNotificationRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **workspace_id** | **int**| id of your workspace. | |
| **base_name** | **string**| name of your base. | |
| **notification_rule_id** | **string**| The ID of the notification rule. | |

### Return type

**object**

### Authorization

AccountTokenAuth




## `listNotificationRules()`

```php
listNotificationRules($workspace_id, $base_name): object
```

List Notification Rules

Use this request to list all the existing notification rules in the current base.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\NotificationsApi(
    new GuzzleHttp\Client(),
    $config
);
$workspace_id = 127; // int | id of your workspace.
$base_name = My Projects; // string | name of your base.

try {
    $result = $apiInstance->listNotificationRules($workspace_id, $base_name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NotificationsApi->listNotificationRules: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **workspace_id** | **int**| id of your workspace. | |
| **base_name** | **string**| name of your base. | |

### Return type

**object**

### Authorization

AccountTokenAuth




## `markNotificationAsSeen()`

```php
markNotificationAsSeen(): object
```

Mark Notifications As Seen

Delete all notifications sent to the current user.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\NotificationsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->markNotificationAsSeen();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NotificationsApi->markNotificationAsSeen: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

**object**

### Authorization

AccountTokenAuth




## `updateNotificationRule()`

```php
updateNotificationRule($workspace_id, $base_name, $notification_rule_id, $update_notification_rule_request): \SeaTable\Client\User\AddNotificationRule200Response
```

Update Notification Rule

Update the params of an existing notification rule.  The `notification_rule_id` is the ID of the notification to be updated. This can be retrieved by [List Notification Rules](/reference/listnotificationrules-1) or can be seen when you [Add Base Notification Rule](/reference/addnotificationrule).  For the exact params that you can update, refer to the params list in the call [Add Base Notification Rule](/reference/addnotificationrule).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\NotificationsApi(
    new GuzzleHttp\Client(),
    $config
);
$workspace_id = 127; // int | id of your workspace.
$base_name = My Projects; // string | name of your base.
$notification_rule_id = 1; // string | The ID of the notification rule.
$update_notification_rule_request = new \SeaTable\Client\User\UpdateNotificationRuleRequest(); // \SeaTable\Client\User\UpdateNotificationRuleRequest

try {
    $result = $apiInstance->updateNotificationRule($workspace_id, $base_name, $notification_rule_id, $update_notification_rule_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NotificationsApi->updateNotificationRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **workspace_id** | **int**| id of your workspace. | |
| **base_name** | **string**| name of your base. | |
| **notification_rule_id** | **string**| The ID of the notification rule. | |
| **update_notification_rule_request** | [**\SeaTable\Client\User\UpdateNotificationRuleRequest**](../Model/UpdateNotificationRuleRequest.md)|  | [optional] |

### Return type

[**\SeaTable\Client\User\AddNotificationRule200Response**](../Model/AddNotificationRule200Response.md)

### Authorization

AccountTokenAuth



