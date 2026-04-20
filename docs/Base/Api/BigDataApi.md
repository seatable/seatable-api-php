# SeaTable\Client\BigDataApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addBigDataRows()**](BigDataApi.md#addBigDataRows) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/add-archived-rows/ | Add Rows into Big Data Backend |
| [**getBaseBigDataOperations()**](BigDataApi.md#getBaseBigDataOperations) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/db-operations/ | Get Base Big Data Operations |
| [**moveRowsToBigData()**](BigDataApi.md#moveRowsToBigData) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/archive-view/ | Move Rows to Big Data Backend |
| [**moveRowsToNormalBackend()**](BigDataApi.md#moveRowsToNormalBackend) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/unarchive/ | Move Rows to Normal Backend |
| [**restoreBigDataOperations()**](BigDataApi.md#restoreBigDataOperations) | **PUT** /api-gateway/api/v2/dtables/{base_uuid}/restore-operations/{op_id}/ | Restore Big Data Operations |


## `addBigDataRows()`

```php
addBigDataRows($base_uuid, $insert_rows_into_big_data): object
```

Add Rows into Big Data Backend

Insert rows directly into the big data backend.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\Base\BigDataApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$insert_rows_into_big_data = new \SeaTable\Client\Base\InsertRowsIntoBigData(); // \SeaTable\Client\Base\InsertRowsIntoBigData

try {
    $result = $apiInstance->addBigDataRows($base_uuid, $insert_rows_into_big_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BigDataApi->addBigDataRows: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **insert_rows_into_big_data** | [**\SeaTable\Client\Base\InsertRowsIntoBigData**](../Model/InsertRowsIntoBigData.md)|  | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `getBaseBigDataOperations()`

```php
getBaseBigDataOperations($base_uuid, $page, $per_page): object
```

Get Base Big Data Operations

Get the operation logs of big data in a base. With the base's `base_uuid`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\Base\BigDataApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$page = 1; // int | The page number you want to start showing the entries. If no value is provided, 1 will be used.
$per_page = 25; // int | The number of results that should be returned. If no value is provided, 25 results will be returned.

try {
    $result = $apiInstance->getBaseBigDataOperations($base_uuid, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BigDataApi->getBaseBigDataOperations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **page** | **int**| The page number you want to start showing the entries. If no value is provided, 1 will be used. | [optional] |
| **per_page** | **int**| The number of results that should be returned. If no value is provided, 25 results will be returned. | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `moveRowsToBigData()`

```php
moveRowsToBigData($base_uuid, $archive_view): object
```

Move Rows to Big Data Backend

Select a view to move its rows to the big data backend. Note that the big data backend must be enabled in this base.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\Base\BigDataApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$archive_view = new \SeaTable\Client\Base\ArchiveView(); // \SeaTable\Client\Base\ArchiveView

try {
    $result = $apiInstance->moveRowsToBigData($base_uuid, $archive_view);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BigDataApi->moveRowsToBigData: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **archive_view** | [**\SeaTable\Client\Base\ArchiveView**](../Model/ArchiveView.md)|  | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `moveRowsToNormalBackend()`

```php
moveRowsToNormalBackend($base_uuid, $move_rows_to_normal_backend_request): object
```

Move Rows to Normal Backend

Moves the selected rows from the big data backend to the normal backend.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\Base\BigDataApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$move_rows_to_normal_backend_request = new \SeaTable\Client\Base\MoveRowsToNormalBackendRequest(); // \SeaTable\Client\Base\MoveRowsToNormalBackendRequest

try {
    $result = $apiInstance->moveRowsToNormalBackend($base_uuid, $move_rows_to_normal_backend_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BigDataApi->moveRowsToNormalBackend: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **move_rows_to_normal_backend_request** | [**\SeaTable\Client\Base\MoveRowsToNormalBackendRequest**](../Model/MoveRowsToNormalBackendRequest.md)|  | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `restoreBigDataOperations()`

```php
restoreBigDataOperations($base_uuid, $op_id): object
```

Restore Big Data Operations

Restore the operations by `op_id` of big data operation logs in a base. With the base's `base_uuid`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');
$apiInstance = new SeaTable\Client\Base\BigDataApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$op_id = 1; // int | The id of the big data operation logs.

try {
    $result = $apiInstance->restoreBigDataOperations($base_uuid, $op_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BigDataApi->restoreBigDataOperations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **op_id** | **int**| The id of the big data operation logs. | |

### Return type

**object**

### Authorization

BaseTokenAuth



