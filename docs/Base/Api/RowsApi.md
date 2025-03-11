# SeaTable\Client\RowsApi

All URIs are relative to https://cloud.seatable.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**appendRows()**](RowsApi.md#appendRows) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/rows/ | Append Row(s) |
| [**deleteRow()**](RowsApi.md#deleteRow) | **DELETE** /api-gateway/api/v2/dtables/{base_uuid}/rows/ | Delete Row(s) |
| [**getRow()**](RowsApi.md#getRow) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/rows/{row_id}/ | Get Row |
| [**listRows()**](RowsApi.md#listRows) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/rows/ | List Rows |
| [**lockRows()**](RowsApi.md#lockRows) | **PUT** /api-gateway/api/v2/dtables/{base_uuid}/lock-rows/ | Lock Rows |
| [**querySQL()**](RowsApi.md#querySQL) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/sql | Query SeaTable with SQL |
| [**unlockRows()**](RowsApi.md#unlockRows) | **PUT** /api-gateway/api/v2/dtables/{base_uuid}/unlock-rows/ | Unlock Rows |
| [**updateRow()**](RowsApi.md#updateRow) | **PUT** /api-gateway/api/v2/dtables/{base_uuid}/rows/ | Update Row(s) |


## `appendRows()`

```php
appendRows($base_uuid, $append_rows): object
```

Append Row(s)

Append multiple rows to a table. Define the column:values pairs of each column in the [rows object](/reference/models).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\RowsApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$append_rows = new \SeaTable\Client\Base\AppendRows(); // \SeaTable\Client\Base\AppendRows

try {
    $result = $apiInstance->appendRows($base_uuid, $append_rows);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RowsApi->appendRows: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **append_rows** | [**\SeaTable\Client\Base\AppendRows**](../Model/AppendRows.md)|  | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `deleteRow()`

```php
deleteRow($base_uuid, $delete_rows): object
```

Delete Row(s)

Deletes one or multiple rows from the table, identified by its row id no matter if the row is stored in big data or normal backend.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\RowsApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$delete_rows = new \SeaTable\Client\Base\DeleteRows(); // \SeaTable\Client\Base\DeleteRows

try {
    $result = $apiInstance->deleteRow($base_uuid, $delete_rows);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RowsApi->deleteRow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **delete_rows** | [**\SeaTable\Client\Base\DeleteRows**](../Model/DeleteRows.md)|  | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `getRow()`

```php
getRow($base_uuid, $row_id, $table_name, $convert_keys): object
```

Get Row

Get the values of one row with all columns and values, according to the row id provided. Depending of `convert` the response will contain the column names or the column keys.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\RowsApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$row_id = Qtf7xPmoRaiFyQPO1aENTjb; // string | The id of the row.
$table_name = Table1; // string | The name of the table to perform the operation on. Alternatively, you can use the `table_id` instead of `table_name`. If using `table_id`, ensure that the key in the request body is replaced accordingly. **Example:** Instead of `table_name: Table1` you can use `table_id: 0000`.
$convert_keys = true; // bool | Determines if the columns are returned as their keys (false by default) or their names (true).

try {
    $result = $apiInstance->getRow($base_uuid, $row_id, $table_name, $convert_keys);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RowsApi->getRow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **row_id** | **string**| The id of the row. | |
| **table_name** | **string**| The name of the table to perform the operation on. Alternatively, you can use the &#x60;table_id&#x60; instead of &#x60;table_name&#x60;. If using &#x60;table_id&#x60;, ensure that the key in the request body is replaced accordingly. **Example:** Instead of &#x60;table_name: Table1&#x60; you can use &#x60;table_id: 0000&#x60;. | |
| **convert_keys** | **bool**| Determines if the columns are returned as their keys (false by default) or their names (true). | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `listRows()`

```php
listRows($base_uuid, $table_name, $view_name, $start, $limit, $convert_keys): object
```

List Rows

Returns a list of rows contained in a table (or in a view if provided).  The usage of a view in SeaTable could be much more convenient then the usage of the complex SQL-syntax of the [SQL query endpoint](/reference/querysql).  > 👍 Big Data support added  >  > Since Version 4.4 this endpoint also supports the big data backend.  Every row consists of the columns, you defined in your base but also *hidden* informations like `_id`, `_mtime`, `_ctime`, `_creator` and so on. Get more details about these information in the [Models](/reference/models) area.  > 📘 Hidden Columns  > > If no view is selected, all columns (even hidden one) are returned. If a view is selected, only the visible columns of that view are returned with the request.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\RowsApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$table_name = Table1; // string | The name of the table to perform the operation on. Alternatively, you can use the `table_id` instead of `table_name`. If using `table_id`, ensure that the key in the request body is replaced accordingly. **Example:** Instead of `table_name: Table1` you can use `table_id: 0000`.
$view_name = Default View; // string | The name of the view to perform the operation on. Alternatively, you can use the `view_id` instead of `view_name`. If using `view_id`, ensure that the key in the request body is replaced accordingly. **Example:** Instead of `view_name: Default View` you an use `view_id: 0000`.
$start = 0; // int | Starting position (number) of the returned rows. 0 by default.
$limit = 100; // int | Number of rows that should be returned. 1000 by default.
$convert_keys = true; // bool | Determines if the columns are returned as their keys (false by default) or their names (true).

try {
    $result = $apiInstance->listRows($base_uuid, $table_name, $view_name, $start, $limit, $convert_keys);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RowsApi->listRows: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **table_name** | **string**| The name of the table to perform the operation on. Alternatively, you can use the &#x60;table_id&#x60; instead of &#x60;table_name&#x60;. If using &#x60;table_id&#x60;, ensure that the key in the request body is replaced accordingly. **Example:** Instead of &#x60;table_name: Table1&#x60; you can use &#x60;table_id: 0000&#x60;. | |
| **view_name** | **string**| The name of the view to perform the operation on. Alternatively, you can use the &#x60;view_id&#x60; instead of &#x60;view_name&#x60;. If using &#x60;view_id&#x60;, ensure that the key in the request body is replaced accordingly. **Example:** Instead of &#x60;view_name: Default View&#x60; you an use &#x60;view_id: 0000&#x60;. | [optional] |
| **start** | **int**| Starting position (number) of the returned rows. 0 by default. | [optional] |
| **limit** | **int**| Number of rows that should be returned. 1000 by default. | [optional] |
| **convert_keys** | **bool**| Determines if the columns are returned as their keys (false by default) or their names (true). | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `lockRows()`

```php
lockRows($base_uuid, $table_with_row_ids): object
```

Lock Rows

Locks one or more rows. It is ok to include rows that were already locked. Rows in big data backend can not be locked.  > 📘 Advanced feature >  > Lock rows is an advanced feature in SeaTable and only available for [enterprise subscriptions](https://seatable.io/preise/?lang=auto).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\RowsApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$table_with_row_ids = new \SeaTable\Client\Base\TableWithRowIds(); // \SeaTable\Client\Base\TableWithRowIds

try {
    $result = $apiInstance->lockRows($base_uuid, $table_with_row_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RowsApi->lockRows: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **table_with_row_ids** | [**\SeaTable\Client\Base\TableWithRowIds**](../Model/TableWithRowIds.md)|  | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `querySQL()`

```php
querySQL($base_uuid, $sql_query): \SeaTable\Client\Base\SqlQueryResponse
```

Query SeaTable with SQL

SeaTable offers a SQL like interface that supports `SELECT`, `INSERT`, `UPDATE` and `DELETE` statements.   If you are familiar with SQL, you will have no difficulties to use this endpoint because typical SQL-statements are supported.          This endpoint is the **most powerful** one that SeaTable can offer and it does not differentiate between the two SeaTable backend (normal and big data). Also the metadata of the table is returned.   > 📘 `INSERT` and big data >  > New rows (INSERT statement) are always added to the **big data backend**. An error message will be returned, if the big data backend is not activated for the target base.  The complete [SQL Reference](https://developer.seatable.io/scripts/sql/reference/) can be found documentation in the developer manual.   Here are some example requests for a fictitious table *Family* with the columns *name*, *age* and *birthday*:  - `SELECT * FROM Family LIMIT 3` - `SELECT name, age, birthday FROM Family` - `SELECT name, age FROM Family ORDER BY name` - `INSERT INTO Family (Name,Age) VALUES ('Name', 23)` - `SELECT * FROM Family WHERE Name=? AND Age=?`  SELECT does not support column keys. You can only limit the output by column names.  > 📘 Avoid SQL injection >  > If you use `?` in your SQL-statement, you have to provide values to replace the placeholders with parameters. This protects against SQL injections.   > 🚧 Max and default return limit > > - The request returns a maximum of 10 000 rows, even if you specify a higher limit in your SQL-statement.  > - If you don't specify a limit, max 100 rows are returned.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\RowsApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$sql_query = new \SeaTable\Client\Base\SqlQuery(); // \SeaTable\Client\Base\SqlQuery

try {
    $result = $apiInstance->querySQL($base_uuid, $sql_query);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RowsApi->querySQL: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **sql_query** | [**\SeaTable\Client\Base\SqlQuery**](../Model/SqlQuery.md)|  | [optional] |

### Return type

[**\SeaTable\Client\Base\SqlQueryResponse**](../Model/SqlQueryResponse.md)

### Authorization

BaseTokenAuth




## `unlockRows()`

```php
unlockRows($base_uuid, $table_with_row_ids): object
```

Unlock Rows

Use this API request to unlock one or more locked rows. As this request makes sure that all the mentioned rows are unlocked, it's OK to include rows that were not locked.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\RowsApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$table_with_row_ids = new \SeaTable\Client\Base\TableWithRowIds(); // \SeaTable\Client\Base\TableWithRowIds

try {
    $result = $apiInstance->unlockRows($base_uuid, $table_with_row_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RowsApi->unlockRows: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **table_with_row_ids** | [**\SeaTable\Client\Base\TableWithRowIds**](../Model/TableWithRowIds.md)|  | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth




## `updateRow()`

```php
updateRow($base_uuid, $update_rows): object
```

Update Row(s)

Change the values in one or multiple existing row(s) by defining the new values for necessary columns in the row object. Both SeaTable backends are supported.  > 📘 Structure of the row object >  > The row object contains key:value pairs with the column name as key and the desired values. Check the page [Models](/reference/models) to get a better understanding of the row object.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer authorization: BaseTokenAuth (use the right token for your request)
$config = SeaTable\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_TOKEN');

$apiInstance = new SeaTable\Client\Base\RowsApi(
    new GuzzleHttp\Client(),
    $config
);
$base_uuid = 5c264e76-0e5a-448a-9f34-580b551364ca; // string | The unique identifier of a base. Sometimes also called dtable_uuid.
$update_rows = new \SeaTable\Client\Base\UpdateRows(); // \SeaTable\Client\Base\UpdateRows

try {
    $result = $apiInstance->updateRow($base_uuid, $update_rows);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RowsApi->updateRow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_uuid** | **string**| The unique identifier of a base. Sometimes also called dtable_uuid. | |
| **update_rows** | [**\SeaTable\Client\Base\UpdateRows**](../Model/UpdateRows.md)|  | [optional] |

### Return type

**object**

### Authorization

BaseTokenAuth



