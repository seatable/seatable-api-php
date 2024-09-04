# # SqlQuery

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**sql** | **string** | SQL-Query to get rows from base. |
**convert_keys** | **bool** | Determines if the columns are returned as their keys (false by default) or their names (true). | [optional]
**parameters** | [**\SeaTable\Client\Base\SqlQueryParametersInner[]**](SqlQueryParametersInner.md) | Parameters in SQL clause to avoid sql injection. Only needed, if you use &#x60;?&#x60; in the SQL statement. The parameters will replace the &#x60;?&#x60; according to their order in the array. | [optional]
**server_only** | **bool** | Show rows from normal and Big Data backend (false by default) or limit the output only to the normal backend (true). | [optional]

