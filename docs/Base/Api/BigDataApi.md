# SeaTable\Client\BigDataApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addBigDataRows()**](BigDataApi.md#addBigDataRows) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/add-archived-rows/ | Add Rows into Big Data Backend |
| [**moveRowsToBigData()**](BigDataApi.md#moveRowsToBigData) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/archive-view/ | Move Rows to Big Data Backend |
| [**moveRowsToNormalBackend()**](BigDataApi.md#moveRowsToNormalBackend) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/unarchive/ | Move Rows to Normal Backend |


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




## `moveRowsToBigData()`

```php
moveRowsToBigData($base_uuid, $archive_view): object
```

Move Rows to Big Data Backend

Use an sql-like where clause to select the rows that should be moved into the big data backend. Big data backend has to be activated in this base.

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
moveRowsToNormalBackend($base_uuid, $move_rows_to_normal_backend_request)
```

Move Rows to Normal Backend

Moves the seleted rows into the big data backend.

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
    $apiInstance->moveRowsToNormalBackend($base_uuid, $move_rows_to_normal_backend_request);
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

void (empty response body)

### Authorization

BaseTokenAuth



