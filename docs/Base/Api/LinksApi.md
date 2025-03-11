# SeaTable\Client\LinksApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**autoLinkTask()**](LinksApi.md#autoLinkTask) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/auto-link-task/ | Auto Link task |
| [**autoLinks()**](LinksApi.md#autoLinks) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/auto-links/ | Auto Links |
| [**createRowLink()**](LinksApi.md#createRowLink) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/links/ | Create Row Link(s) |
| [**deleteRowLink()**](LinksApi.md#deleteRowLink) | **DELETE** /api-gateway/api/v2/dtables/{base_uuid}/links/ | Delete Row Link(s) |
| [**listRowLinks()**](LinksApi.md#listRowLinks) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/query-links/ | List Row Links |
| [**updateRowLink()**](LinksApi.md#updateRowLink) | **PUT** /api-gateway/api/v2/dtables/{base_uuid}/links/ | Update Row Link(s) |


## `autoLinkTask()`

```php
autoLinkTask($base_uuid, $body): object
```

Auto Link task

Query the status of auto add links task.There are 3 different status: - success - failed - running

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\LinksApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$body = 'body_example'; // string

try {
    $result = $apiInstance->autoLinkTask($base_uuid, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LinksApi->autoLinkTask: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **body** | **string**|  | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `autoLinks()`

```php
autoLinks($base_uuid, $match_link_columns): object
```

Auto Links

Automatically create link relationships.  The caller needs to create a link column before calling the API,  supporting both archived and unarchived data. It will return a task ID, by quering which you can get the status of the link creation in the backend wihtin 5 minutes. The matched data in the link column in the 2 tables must have the similar  data structure (not same column type). For example, the text column can match email, auto-number or url type column, and so on. Currently, there are a few restrictions: - Formula and link-formula columns are not supported as matching columns - Single-select columns cannot be matched with text columns.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\LinksApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$match_link_columns = new \SeaTable\Client\Base\MatchLinkColumns(); // \SeaTable\Client\Base\MatchLinkColumns

try {
    $result = $apiInstance->autoLinks($base_uuid, $match_link_columns);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LinksApi->autoLinks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **match_link_columns** | [**\SeaTable\Client\Base\MatchLinkColumns**](../Model/MatchLinkColumns.md)|  | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `createRowLink()`

```php
createRowLink($base_uuid, $row_link_create_update_delete): object
```

Create Row Link(s)

Creates multiple links between one column and many others (1:n relation). It is not possible to create a link twice. This will result in an error.  Here is an example, how the body with `other_rows_ids_map` can look like:  ``` \"other_rows_ids_map\": {   \"ZEZuAL_8QS6p0tJ2vyKgKw\": [\"Qtf7xPmoRaiFyQPO1aENTj\", \"PSnPPXD6SranQwA4_MhN8A\"],   \"PCFS8gY9R8yok5ZZOSqbHg\": [\"WO2IlomAQVeACVVg8liOMA\", \"PSnPPXD6SranQwA4_MhN8A\"] } ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\LinksApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$row_link_create_update_delete = new \SeaTable\Client\Base\RowLinkCreateUpdateDelete(); // \SeaTable\Client\Base\RowLinkCreateUpdateDelete

try {
    $result = $apiInstance->createRowLink($base_uuid, $row_link_create_update_delete);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LinksApi->createRowLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **row_link_create_update_delete** | [**\SeaTable\Client\Base\RowLinkCreateUpdateDelete**](../Model/RowLinkCreateUpdateDelete.md)|  | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `deleteRowLink()`

```php
deleteRowLink($base_uuid, $row_link_create_update_delete): object
```

Delete Row Link(s)

Deletes one or multiple links between two rows. Only the links between the row_ids mentioned in the mapping, will be removed. Other links will stay and not touched.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\LinksApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$row_link_create_update_delete = new \SeaTable\Client\Base\RowLinkCreateUpdateDelete(); // \SeaTable\Client\Base\RowLinkCreateUpdateDelete

try {
    $result = $apiInstance->deleteRowLink($base_uuid, $row_link_create_update_delete);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LinksApi->deleteRowLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **row_link_create_update_delete** | [**\SeaTable\Client\Base\RowLinkCreateUpdateDelete**](../Model/RowLinkCreateUpdateDelete.md)|  | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `listRowLinks()`

```php
listRowLinks($base_uuid, $list_row_links): object
```

List Row Links

When you have a \"Link to other records\" column in your table and you have created some links to the current or another table, you can use this request to query each row's linked records' IDs and display values.  > 📘 id or name >  > In the request body you can as keys either: > - `table_id` or `table_name` > - `link_column_key` or `link_column_name`      To get more information about each linked record, retrieve their `row_id` and use the [Query SeaTable with SQL](/reference/querysql) request, for example:  ``` SELECT * FROM Table1 WHERE _id IN (row_id1, row_id2, ...); ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\LinksApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$list_row_links = new \SeaTable\Client\Base\ListRowLinks(); // \SeaTable\Client\Base\ListRowLinks

try {
    $result = $apiInstance->listRowLinks($base_uuid, $list_row_links);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LinksApi->listRowLinks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **list_row_links** | [**\SeaTable\Client\Base\ListRowLinks**](../Model/ListRowLinks.md)|  | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `updateRowLink()`

```php
updateRowLink($base_uuid, $row_link_create_update_delete): object
```

Update Row Link(s)

Updates the link(s) between one column and many others (1:n relation). Existings links will be removed and replaced with this new mapping.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\LinksApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$row_link_create_update_delete = new \SeaTable\Client\Base\RowLinkCreateUpdateDelete(); // \SeaTable\Client\Base\RowLinkCreateUpdateDelete

try {
    $result = $apiInstance->updateRowLink($base_uuid, $row_link_create_update_delete);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LinksApi->updateRowLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **row_link_create_update_delete** | [**\SeaTable\Client\Base\RowLinkCreateUpdateDelete**](../Model/RowLinkCreateUpdateDelete.md)|  | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth



