# SeaTable\Client\MaintenanceApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**repairBase()**](MaintenanceApi.md#repairBase) | **PUT** /api/v2.1/admin/dtable/{base_uuid}/repair/ | Repair Base |


## `repairBase()`

```php
repairBase($base_uuid): \SeaTable\Client\SysAdmin\RepairBase200Response
```

Repair Base

Repairs a base identified by its base_uuid. This repair scripts tries to detect errors in the json object and fix common problems.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: AccountTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\SysAdmin\MaintenanceApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.

try {
    $result = $apiInstance->repairBase($base_uuid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MaintenanceApi->repairBase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |

### Return type

[**\SeaTable\Client\SysAdmin\RepairBase200Response**](../Model/RepairBase200Response.md)

### Authorization

AccountTokenAuth



