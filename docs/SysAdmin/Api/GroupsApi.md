# SeaTable\Client\GroupsApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createGroup()**](GroupsApi.md#createGroup) | **POST** /api/v2.1/admin/groups/ | Create Group |
| [**deleteGroup()**](GroupsApi.md#deleteGroup) | **DELETE** /api/v2.1/admin/groups/{group_id}/ | Delete Group |
| [**listGroups()**](GroupsApi.md#listGroups) | **GET** /api/v2.1/admin/groups/ | List Groups |
| [**transferGroup()**](GroupsApi.md#transferGroup) | **PUT** /api/v2.1/admin/groups/{group_id}/ | Transfer Group |


## `createGroup()`

```php
createGroup($create_group_request): object
```

Create Group

Create a new group with a specified name and owner.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\GroupsApi(
    new GuzzleHttp\Client(),
    $config
);
$create_group_request = new \SeaTable\Client\SysAdmin\CreateGroupRequest(); // \SeaTable\Client\SysAdmin\CreateGroupRequest

try {
    $result = $apiInstance->createGroup($create_group_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->createGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_group_request** | [**\SeaTable\Client\SysAdmin\CreateGroupRequest**](../Model/CreateGroupRequest.md)|  | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth




## `deleteGroup()`

```php
deleteGroup($group_id): object
```

Delete Group

Delete a group with its ID.  > 🚧 Group must be empty > > A group can only be deleted if it contains no bases. Delete or move all bases out of the group first, otherwise the API returns `400` with `\"Cannot delete group with bases\"`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\GroupsApi(
    new GuzzleHttp\Client(),
    $config
);
$group_id = 48; // int | The ID of the group.

try {
    $result = $apiInstance->deleteGroup($group_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->deleteGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **int**| The ID of the group. | |

### Return type

**object**

### Authorization

AccountTokenAuth




## `listGroups()`

```php
listGroups($page, $per_page, $name): object
```

List Groups

Shows a list of all groups of the system. You can also search for a group by his name.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\GroupsApi(
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.
$name = 'name_example'; // string | Enter any query string from the name of the group.

try {
    $result = $apiInstance->listGroups($page, $per_page, $name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->listGroups: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |
| **name** | **string**| Enter any query string from the name of the group. | [optional] |

### Return type

**object**

### Authorization

AccountTokenAuth




## `transferGroup()`

```php
transferGroup($group_id, $transfer_group_request): \SeaTable\Client\SysAdmin\TransferGroup200Response
```

Transfer Group

Transfer the ownership of a group to a new owner.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\GroupsApi(
    new GuzzleHttp\Client(),
    $config
);
$group_id = 48; // int | The ID of the group.
$transfer_group_request = new \SeaTable\Client\SysAdmin\TransferGroupRequest(); // \SeaTable\Client\SysAdmin\TransferGroupRequest

try {
    $result = $apiInstance->transferGroup($group_id, $transfer_group_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->transferGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **int**| The ID of the group. | |
| **transfer_group_request** | [**\SeaTable\Client\SysAdmin\TransferGroupRequest**](../Model/TransferGroupRequest.md)|  | [optional] |

### Return type

[**\SeaTable\Client\SysAdmin\TransferGroup200Response**](../Model/TransferGroup200Response.md)

### Authorization

AccountTokenAuth



