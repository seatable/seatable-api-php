# SeaTable\Client\DepartmentsApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addDepartmentMembers()**](DepartmentsApi.md#addDepartmentMembers) | **POST** /api/v2.1/address-book-v2/departments/{department_id}/members/ | Add Department Members |
| [**getDepartmentGroupMembersCount()**](DepartmentsApi.md#getDepartmentGroupMembersCount) | **GET** /api/v2.1/address-book-v2/departments/groups/{group_id}/members-count/ | Get Department Group Members Count |
| [**listDepartmentMemberBases()**](DepartmentsApi.md#listDepartmentMemberBases) | **GET** /api/v2.1/address-book-v2/departments/{department_id}/members/{user_id}/dtables/ | List Department Member&#39;s Bases |
| [**listDepartmentMembers()**](DepartmentsApi.md#listDepartmentMembers) | **GET** /api/v2.1/address-book-v2/departments/{department_id}/members/ | List Department Members |
| [**listDepartments()**](DepartmentsApi.md#listDepartments) | **GET** /api/v2.1/address-book-v2/departments/ | List Departments |
| [**listSubDepartments()**](DepartmentsApi.md#listSubDepartments) | **GET** /api/v2.1/address-book-v2/departments/{department_id}/sub-departments/ | List Sub-Departments |
| [**listUserDepartments()**](DepartmentsApi.md#listUserDepartments) | **GET** /api/v2.1/address-book-v2/user-departments/ | List User&#39;s Departments |
| [**removeDepartmentMember()**](DepartmentsApi.md#removeDepartmentMember) | **DELETE** /api/v2.1/address-book-v2/departments/{department_id}/members/{user_id}/ | Remove Department Member |
| [**updateDepartmentMember()**](DepartmentsApi.md#updateDepartmentMember) | **PUT** /api/v2.1/address-book-v2/departments/{department_id}/members/{user_id}/ | Update Department Member |


## `addDepartmentMembers()`

```php
addDepartmentMembers($department_id, $add_department_members_request): \SeaTable\Client\User\AddDepartmentMembers200Response
```

Add Department Members

Add one or more users to a department. You have to be an admin of the department, and the department has to have a group.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$department_id = 10; // int | ID of the department. Required.
$add_department_members_request = new \SeaTable\Client\User\AddDepartmentMembersRequest(); // \SeaTable\Client\User\AddDepartmentMembersRequest

try {
    $result = $apiInstance->addDepartmentMembers($department_id, $add_department_members_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->addDepartmentMembers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **department_id** | **int**| ID of the department. Required. | |
| **add_department_members_request** | [**\SeaTable\Client\User\AddDepartmentMembersRequest**](../Model/AddDepartmentMembersRequest.md)|  | [optional] |

### Return type

[**\SeaTable\Client\User\AddDepartmentMembers200Response**](../Model/AddDepartmentMembers200Response.md)

### Authorization

AccountTokenAuth




## `getDepartmentGroupMembersCount()`

```php
getDepartmentGroupMembersCount($group_id): \SeaTable\Client\User\GetDepartmentGroupMembersCount200Response
```

Get Department Group Members Count

Get the number of members of a department group. The members of a department group are the members of the department and of all its sub-departments.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$group_id = 1; // int | The ID of the group.

try {
    $result = $apiInstance->getDepartmentGroupMembersCount($group_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->getDepartmentGroupMembersCount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **int**| The ID of the group. | |

### Return type

[**\SeaTable\Client\User\GetDepartmentGroupMembersCount200Response**](../Model/GetDepartmentGroupMembersCount200Response.md)

### Authorization

AccountTokenAuth




## `listDepartmentMemberBases()`

```php
listDepartmentMemberBases($department_id, $user_id): \SeaTable\Client\User\ListDepartmentMemberBases200Response
```

List Department Member's Bases

List the personal bases of a department member. You have to be a member of one of the department's ancestor departments.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$department_id = 10; // int | ID of the department. Required.
$user_id = 123456789f1e4c8d8e1c31415867317c@auth.local; // string | The unique user ID in the format `xxx@auth.local`.

try {
    $result = $apiInstance->listDepartmentMemberBases($department_id, $user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->listDepartmentMemberBases: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **department_id** | **int**| ID of the department. Required. | |
| **user_id** | **string**| The unique user ID in the format &#x60;xxx@auth.local&#x60;. | |

### Return type

[**\SeaTable\Client\User\ListDepartmentMemberBases200Response**](../Model/ListDepartmentMemberBases200Response.md)

### Authorization

AccountTokenAuth




## `listDepartmentMembers()`

```php
listDepartmentMembers($department_id): \SeaTable\Client\User\ListDepartmentMembers200Response
```

List Department Members

List the members of a department in your system or team (organization).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$department_id = 10; // int | ID of the department. Required.

try {
    $result = $apiInstance->listDepartmentMembers($department_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->listDepartmentMembers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **department_id** | **int**| ID of the department. Required. | |

### Return type

[**\SeaTable\Client\User\ListDepartmentMembers200Response**](../Model/ListDepartmentMembers200Response.md)

### Authorization

AccountTokenAuth




## `listDepartments()`

```php
listDepartments(): \SeaTable\Client\User\ListDepartments200Response
```

List Departments

List all the departments of the system or, as a team user, of your team (organization).  The returned `id` values are the IDs of each department. If the `parent_id` is `-1`, it means this department is the top-level department.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listDepartments();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->listDepartments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\SeaTable\Client\User\ListDepartments200Response**](../Model/ListDepartments200Response.md)

### Authorization

AccountTokenAuth




## `listSubDepartments()`

```php
listSubDepartments($department_id): \SeaTable\Client\User\ListUserDepartments200Response
```

List Sub-Departments

List the direct sub-departments of a department.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$department_id = 10; // int | ID of the department. Required.

try {
    $result = $apiInstance->listSubDepartments($department_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->listSubDepartments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **department_id** | **int**| ID of the department. Required. | |

### Return type

[**\SeaTable\Client\User\ListUserDepartments200Response**](../Model/ListUserDepartments200Response.md)

### Authorization

AccountTokenAuth




## `listUserDepartments()`

```php
listUserDepartments(): \SeaTable\Client\User\ListUserDepartments200Response
```

List User's Departments

List the departments you are a member of. Every department is returned together with its tree of `sub_departments`. Departments that are already contained in the tree of another returned department are not listed again.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listUserDepartments();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->listUserDepartments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\SeaTable\Client\User\ListUserDepartments200Response**](../Model/ListUserDepartments200Response.md)

### Authorization

AccountTokenAuth




## `removeDepartmentMember()`

```php
removeDepartmentMember($department_id, $user_id): object
```

Remove Department Member

Remove a user from a department. You have to be an admin of the department, and the department has to have a group.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$department_id = 10; // int | ID of the department. Required.
$user_id = 123456789f1e4c8d8e1c31415867317c@auth.local; // string | The unique user ID in the format `xxx@auth.local`.

try {
    $result = $apiInstance->removeDepartmentMember($department_id, $user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->removeDepartmentMember: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **department_id** | **int**| ID of the department. Required. | |
| **user_id** | **string**| The unique user ID in the format &#x60;xxx@auth.local&#x60;. | |

### Return type

**object**

### Authorization

AccountTokenAuth




## `updateDepartmentMember()`

```php
updateDepartmentMember($department_id, $user_id, $update_group_role_request): \SeaTable\Client\User\UpdateDepartmentMember200Response
```

Update Department Member

Promote a department member to department admin or demote them. You have to be an admin of the department, and the department has to have a group.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\User\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$department_id = 10; // int | ID of the department. Required.
$user_id = 123456789f1e4c8d8e1c31415867317c@auth.local; // string | The unique user ID in the format `xxx@auth.local`.
$update_group_role_request = new \SeaTable\Client\User\UpdateGroupRoleRequest(); // \SeaTable\Client\User\UpdateGroupRoleRequest

try {
    $result = $apiInstance->updateDepartmentMember($department_id, $user_id, $update_group_role_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->updateDepartmentMember: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **department_id** | **int**| ID of the department. Required. | |
| **user_id** | **string**| The unique user ID in the format &#x60;xxx@auth.local&#x60;. | |
| **update_group_role_request** | [**\SeaTable\Client\User\UpdateGroupRoleRequest**](../Model/UpdateGroupRoleRequest.md)|  | [optional] |

### Return type

[**\SeaTable\Client\User\UpdateDepartmentMember200Response**](../Model/UpdateDepartmentMember200Response.md)

### Authorization

AccountTokenAuth



