# # ListRowLinks

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**table_name** | **string** | The name of the table to perform the operation on. Alternatively, you can use the &#x60;table_id&#x60; instead of &#x60;table_name&#x60;. If using &#x60;table_id&#x60;, ensure that the key in the request body is replaced accordingly. |
**link_column_name** | **string** | The name of the link-column. Alternatively, you can use &#x60;link_column_key&#x60; instead. Do not use the &#x60;link_id&#x60; of the link column here. |
**rows** | [**\SeaTable\Client\Base\ListRowLinksRowsInner[]**](ListRowLinksRowsInner.md) | The rows (identified by their ids) you want to get the links for. |

