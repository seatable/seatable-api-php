# # ListRowLinksRowsInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**row_id** | **string** | The id of the row. The id of a row is unique inside a base and is often used to identify one specific row. |
**offset** | **int** | Offset is the beginning number of your query. If your record is linked to multiple records, use e.g. 0 to start quering from the 1st element or e.g. 5 to start querying from the 6th element, etc. Attention: The returned list of linked rows is not ordered by its original order on the web interface, but rather by created time (ctime). Default is 0. | [optional]
**limit** | **int** | Specify the maximum number of records to be returned. For example, use 20 to retrieve more than the default 10 records. | [optional]

