# SeaTable\Client\DepartmentsApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addDepartment()**](DepartmentsApi.md#addDepartment) | **POST** /api/v2.1/admin/address-book-v2/departments/ | Add Department |
| [**addDepartmentMembers()**](DepartmentsApi.md#addDepartmentMembers) | **POST** /api/v2.1/admin/address-book-v2/departments/{department_id}/members/ | Add Department Members |
| [**addUserToDepartments()**](DepartmentsApi.md#addUserToDepartments) | **POST** /api/v2.1/admin/address-book-v2/departments/add-to-departments/ | Add User to Departments |
| [**createDepartmentGroup()**](DepartmentsApi.md#createDepartmentGroup) | **POST** /api/v2.1/admin/address-book-v2/departments/{department_id}/group/ | Create Department Group |
| [**deleteDepartment()**](DepartmentsApi.md#deleteDepartment) | **DELETE** /api/v2.1/admin/address-book-v2/departments/{department_id}/ | Delete Department |
| [**deleteDepartmentGroup()**](DepartmentsApi.md#deleteDepartmentGroup) | **DELETE** /api/v2.1/admin/address-book-v2/departments/{department_id}/group/ | Delete Department Group |
| [**getDepartmentGroup()**](DepartmentsApi.md#getDepartmentGroup) | **GET** /api/v2.1/admin/address-book-v2/departments/{department_id}/group/ | Get Department Group |
| [**listDepartmentMembers()**](DepartmentsApi.md#listDepartmentMembers) | **GET** /api/v2.1/admin/address-book-v2/departments/{department_id}/members/ | List Department Members |
| [**listDepartments()**](DepartmentsApi.md#listDepartments) | **GET** /api/v2.1/admin/address-book-v2/departments/ | List Departments |
| [**listNonDepartmentUsers()**](DepartmentsApi.md#listNonDepartmentUsers) | **GET** /api/v2.1/admin/address-book-v2/non-department-users/ | List Users without Department |
| [**removeDepartmentMember()**](DepartmentsApi.md#removeDepartmentMember) | **DELETE** /api/v2.1/admin/address-book-v2/departments/{department_id}/members/{user_id}/ | Remove Department Member |
| [**updateDepartment()**](DepartmentsApi.md#updateDepartment) | **PUT** /api/v2.1/admin/address-book-v2/departments/{department_id}/ | Update Department |
| [**updateDepartmentMember()**](DepartmentsApi.md#updateDepartmentMember) | **PUT** /api/v2.1/admin/address-book-v2/departments/{department_id}/members/{user_id}/ | Update Department Member |


## `addDepartment()`

```php
addDepartment($add_department_request): \SeaTable\Client\SysAdmin\AddDepartment200Response
```

Add Department

Add a new department with a desired name below a parent department.  There can be only one top-level department (`parent_id` of `-1`) per system or team. Every further department has to be created below an existing department. Department names have to be unique within the same parent department.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$add_department_request = new \SeaTable\Client\SysAdmin\AddDepartmentRequest(); // \SeaTable\Client\SysAdmin\AddDepartmentRequest

try {
    $result = $apiInstance->addDepartment($add_department_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->addDepartment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **add_department_request** | [**\SeaTable\Client\SysAdmin\AddDepartmentRequest**](../Model/AddDepartmentRequest.md)|  | [optional] |

### Return type

[**\SeaTable\Client\SysAdmin\AddDepartment200Response**](../Model/AddDepartment200Response.md)

### Authorization

AccountTokenAuth




## `addDepartmentMembers()`

```php
addDepartmentMembers($department_id, $email): \SeaTable\Client\SysAdmin\AddDepartmentMembers200Response
```

Add Department Members

Add one or more users to a department. Repeat the `email` field for every user you want to add.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$department_id = 1; // int | The ID of the department.
$email = array('email_example'); // string[]

try {
    $result = $apiInstance->addDepartmentMembers($department_id, $email);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->addDepartmentMembers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **department_id** | **int**| The ID of the department. | |
| **email** | [**string[]**](../Model/string.md)|  | |

### Return type

[**\SeaTable\Client\SysAdmin\AddDepartmentMembers200Response**](../Model/AddDepartmentMembers200Response.md)

### Authorization

AccountTokenAuth




## `addUserToDepartments()`

```php
addUserToDepartments($add_user_to_departments_request): \SeaTable\Client\SysAdmin\AddDepartmentMembers200Response
```

Add User to Departments

Add a single user to one or more system-level departments at once. Departments the user is already a member of are listed under `failed`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$add_user_to_departments_request = new \SeaTable\Client\SysAdmin\AddUserToDepartmentsRequest(); // \SeaTable\Client\SysAdmin\AddUserToDepartmentsRequest

try {
    $result = $apiInstance->addUserToDepartments($add_user_to_departments_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->addUserToDepartments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **add_user_to_departments_request** | [**\SeaTable\Client\SysAdmin\AddUserToDepartmentsRequest**](../Model/AddUserToDepartmentsRequest.md)|  | [optional] |

### Return type

[**\SeaTable\Client\SysAdmin\AddDepartmentMembers200Response**](../Model/AddDepartmentMembers200Response.md)

### Authorization

AccountTokenAuth




## `createDepartmentGroup()`

```php
createDepartmentGroup($department_id): \SeaTable\Client\SysAdmin\GetDepartmentGroup200Response
```

Create Department Group

Create a group (with its own workspace) for a department, so that the department can own bases. A department can have at most one group.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$department_id = 1; // int | The ID of the department.

try {
    $result = $apiInstance->createDepartmentGroup($department_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->createDepartmentGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **department_id** | **int**| The ID of the department. | |

### Return type

[**\SeaTable\Client\SysAdmin\GetDepartmentGroup200Response**](../Model/GetDepartmentGroup200Response.md)

### Authorization

AccountTokenAuth




## `deleteDepartment()`

```php
deleteDepartment($department_id): object
```

Delete Department

Delete a department by its ID. The department's group (if any) is deleted along with it.  > 🚧 Department must not have sub-departments > > A department can only be deleted if it has no sub-departments. Delete all sub-departments first, otherwise the API returns `400` with `\"Forbidden deleting departments with sub departments\"`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$department_id = 1; // int | The ID of the department.

try {
    $result = $apiInstance->deleteDepartment($department_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->deleteDepartment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **department_id** | **int**| The ID of the department. | |

### Return type

**object**

### Authorization

AccountTokenAuth




## `deleteDepartmentGroup()`

```php
deleteDepartmentGroup($department_id): object
```

Delete Department Group

Delete the group of a department. The department itself is kept.  > 🚧 Group must be empty > > The group can only be deleted if it contains no bases. Delete or move all bases out of the group first, otherwise the API returns `400` with `\"Cannot delete group with bases\"`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$department_id = 1; // int | The ID of the department.

try {
    $result = $apiInstance->deleteDepartmentGroup($department_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->deleteDepartmentGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **department_id** | **int**| The ID of the department. | |

### Return type

**object**

### Authorization

AccountTokenAuth




## `getDepartmentGroup()`

```php
getDepartmentGroup($department_id): \SeaTable\Client\SysAdmin\GetDepartmentGroup200Response
```

Get Department Group

Get the group of a department. Returns `404` if the department has no group.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$department_id = 1; // int | The ID of the department.

try {
    $result = $apiInstance->getDepartmentGroup($department_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->getDepartmentGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **department_id** | **int**| The ID of the department. | |

### Return type

[**\SeaTable\Client\SysAdmin\GetDepartmentGroup200Response**](../Model/GetDepartmentGroup200Response.md)

### Authorization

AccountTokenAuth




## `listDepartmentMembers()`

```php
listDepartmentMembers($department_id): \SeaTable\Client\SysAdmin\ListDepartmentMembers200Response
```

List Department Members

List the members of a department by its ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$department_id = 1; // int | The ID of the department.

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
| **department_id** | **int**| The ID of the department. | |

### Return type

[**\SeaTable\Client\SysAdmin\ListDepartmentMembers200Response**](../Model/ListDepartmentMembers200Response.md)

### Authorization

AccountTokenAuth




## `listDepartments()`

```php
listDepartments($parent_id, $org_id): \SeaTable\Client\SysAdmin\ListDepartments200Response
```

List Departments

List the departments on one level of the department tree. Without `parent_id` (or with `parent_id=-1`), the top-level department is returned. With `parent_id`, the sub-departments of that department are returned.  Departments of a team are listed by passing the team's `org_id`. Without `org_id`, the system-level departments (`org_id` of `-1`) are returned.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$parent_id = 1; // int | The ID of the parent department. Optional. Without it (or with `-1`), the top-level department is returned.
$org_id = -1; // int | The ID of the team. Optional. `-1` (system-level departments) by default.

try {
    $result = $apiInstance->listDepartments($parent_id, $org_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->listDepartments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **parent_id** | **int**| The ID of the parent department. Optional. Without it (or with &#x60;-1&#x60;), the top-level department is returned. | [optional] |
| **org_id** | **int**| The ID of the team. Optional. &#x60;-1&#x60; (system-level departments) by default. | [optional] |

### Return type

[**\SeaTable\Client\SysAdmin\ListDepartments200Response**](../Model/ListDepartments200Response.md)

### Authorization

AccountTokenAuth




## `listNonDepartmentUsers()`

```php
listNonDepartmentUsers(): \SeaTable\Client\SysAdmin\ListNonDepartmentUsers200Response
```

List Users without Department

List all active users that are not a member of any department. Team users are not included.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listNonDepartmentUsers();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->listNonDepartmentUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\SeaTable\Client\SysAdmin\ListNonDepartmentUsers200Response**](../Model/ListNonDepartmentUsers200Response.md)

### Authorization

AccountTokenAuth




## `removeDepartmentMember()`

```php
removeDepartmentMember($department_id, $user_id): object
```

Remove Department Member

Remove a user from a department.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$department_id = 1; // int | The ID of the department.
$user_id = 2abc456def789abc123def456abc789a@auth.local; // string | The unique user id in the form ...@auth.local. This is not the email address of the user.

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
| **department_id** | **int**| The ID of the department. | |
| **user_id** | **string**| The unique user id in the form ...@auth.local. This is not the email address of the user. | |

### Return type

**object**

### Authorization

AccountTokenAuth




## `updateDepartment()`

```php
updateDepartment($department_id, $update_department_request): \SeaTable\Client\SysAdmin\AddDepartment200Response
```

Update Department

Rename a department by its ID. If the department has a [group](/reference/createdepartmentgroup), the group is renamed as well.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$department_id = 1; // int | The ID of the department.
$update_department_request = new \SeaTable\Client\SysAdmin\UpdateDepartmentRequest(); // \SeaTable\Client\SysAdmin\UpdateDepartmentRequest

try {
    $result = $apiInstance->updateDepartment($department_id, $update_department_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->updateDepartment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **department_id** | **int**| The ID of the department. | |
| **update_department_request** | [**\SeaTable\Client\SysAdmin\UpdateDepartmentRequest**](../Model/UpdateDepartmentRequest.md)|  | [optional] |

### Return type

[**\SeaTable\Client\SysAdmin\AddDepartment200Response**](../Model/AddDepartment200Response.md)

### Authorization

AccountTokenAuth




## `updateDepartmentMember()`

```php
updateDepartmentMember($department_id, $user_id, $update_department_member_request): \SeaTable\Client\SysAdmin\UpdateDepartmentMember200Response
```

Update Department Member

Set whether a department member is an administrator of the department.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\SysAdmin\DepartmentsApi(
    new GuzzleHttp\Client(),
    $config
);
$department_id = 1; // int | The ID of the department.
$user_id = 2abc456def789abc123def456abc789a@auth.local; // string | The unique user id in the form ...@auth.local. This is not the email address of the user.
$update_department_member_request = new \SeaTable\Client\SysAdmin\UpdateDepartmentMemberRequest(); // \SeaTable\Client\SysAdmin\UpdateDepartmentMemberRequest

try {
    $result = $apiInstance->updateDepartmentMember($department_id, $user_id, $update_department_member_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentsApi->updateDepartmentMember: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **department_id** | **int**| The ID of the department. | |
| **user_id** | **string**| The unique user id in the form ...@auth.local. This is not the email address of the user. | |
| **update_department_member_request** | [**\SeaTable\Client\SysAdmin\UpdateDepartmentMemberRequest**](../Model/UpdateDepartmentMemberRequest.md)|  | [optional] |

### Return type

[**\SeaTable\Client\SysAdmin\UpdateDepartmentMember200Response**](../Model/UpdateDepartmentMember200Response.md)

### Authorization

AccountTokenAuth



