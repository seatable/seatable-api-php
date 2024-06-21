# # RowLinkCreateUpdateDelete

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**table_id** | **string** | The id of the table. The id of a table is unique inside a base and is often used to identify a table. In most calls it is possible to replace the &#x60;table_id&#x60; with the &#x60;table_name&#x60;. |
**other_table_id** | **string** | The id of the table. The id of a table is unique inside a base and is often used to identify a table. In most calls it is possible to replace the &#x60;table_id&#x60; with the &#x60;table_name&#x60;. |
**link_id** | **string** | Every *link column* has a &#x60;key&#x60; and &#x60;link_id&#x60; in the column object. Use [Get Metadata](/reference/getmetadata) or [Get Base Info](/reference/getbaseinfo) to get this &#x60;link_id&#x60;. Don&#39;t use the &#x60;key&#x60; of the link column. |
**other_rows_ids_map** | **array<string,string[]>** | Provide an object where each key is a &#x60;row_id&#x60; and each value is an array of other row_ids. |

