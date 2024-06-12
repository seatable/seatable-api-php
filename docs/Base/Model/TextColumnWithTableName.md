# # TextColumnWithTableName

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**table_name** | **string** | The name of the table to perform the operation on. Alternatively, you can use the &#x60;table_id&#x60; instead of &#x60;table_name&#x60;. If using &#x60;table_id&#x60;, ensure that the key in the request body is replaced accordingly. |
**column_name** | **string** | The name of the column. |
**column_type** | **string** |  |
**anchor_column** | **string** | Give the name or the key of a column after you would like to add this new column. If you leave this empty, the new column will be created at the end. | [optional]

