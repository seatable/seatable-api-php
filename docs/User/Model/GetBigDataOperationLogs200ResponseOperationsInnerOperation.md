# # GetBigDataOperationLogs200ResponseOperationsInnerOperation

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**row_id** | **string** | The ID of the row affected by the operation. | [optional]
**table_id** | **string** | The ID of the table affected by the operation. | [optional]
**op_type** | **string** | The type of operation (e.g., &#x60;update_row&#x60;, &#x60;add_row&#x60;). | [optional]
**updated** | **array<string,string>** | The updated values in the row after the operation. | [optional]
**old_row** | **array<string,string>** | The original values in the row before the operation. | [optional]
**row_data** | **array<string,string>** | Data of the row being added (for &#x60;add_row&#x60; operation). | [optional]

