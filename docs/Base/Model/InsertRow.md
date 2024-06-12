# # InsertRow

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**table_name** | **string** | The name of the table to perform the operation on. Alternatively, you can use the &#x60;table_id&#x60; instead of &#x60;table_name&#x60;. If using &#x60;table_id&#x60;, ensure that the key in the request body is replaced accordingly. |
**anchor_row_id** | **string** | Id of the row the new row should be added next to | [optional]
**row_insert_position** | **string** | Defines if the new row is added below or above anchor row. If this parameter is left blank, &#x60;insert_below&#x60; is taken as default value. | [optional]
**row** | **object** | Pass the set of column names and their values. The column names must be present in your table. Different column types require different ways to input values. For eg: {\&quot;Name\&quot;:\&quot;Max\&quot;, \&quot;Age\&quot;:\&quot;21\&quot;, \&quot;Birthday\&quot;:\&quot;2023-02-18\&quot;, \&quot;Checkbox\&quot;:\&quot;true\&quot;} |
**apply_default** | **bool** | Use the column default values to populate new rows during creation. False by default. | [optional]

