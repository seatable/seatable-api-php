# # AppendRows

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**table_name** | **string** | The name of the table to perform the operation on. Alternatively, you can use the &#x60;table_id&#x60; instead of &#x60;table_name&#x60;. If using &#x60;table_id&#x60;, ensure that the key in the request body is replaced accordingly. |
**rows** | **object[]** | Defines the rows which should be added. |
**apply_default** | **bool** | Use the column default values to populate new rows during creation. False by default. | [optional]

