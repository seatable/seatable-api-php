# # ArchiveView

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**table_name** | **string** | The name of the table to perform the operation on. Alternatively, you can use the &#x60;table_id&#x60; instead of &#x60;table_name&#x60;. If using &#x60;table_id&#x60;, ensure that the key in the request body is replaced accordingly. |
**where** | **string** | Use an sql-like clause to select the rows you want to archive. If not set, all rows in the table will be archived.  More examples are: &lt;br/&gt; \\&#x60;Name\\&#x60; &#x3D; &#39;Michael&#39; &lt;br/&gt; \\&#x60;Gender\\&#x60; !&#x3D; &#39;Michael&#39; &lt;br/&gt; \\&#x60;Name of the column\\&#x60; ilike &#39;%error%&#39; | [optional]

