# # UpdateView

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The name of the view to perform the operation on. Alternatively, you can use the &#x60;view_id&#x60; instead of &#x60;view_name&#x60;. If using &#x60;view_id&#x60;, ensure that the key in the request body is replaced accordingly. **Example:** Instead of &#x60;view_name: Default View&#x60; you can use &#x60;view_id: 0000&#x60;. | [optional]
**is_locked** | **bool** |  | [optional]
**filters** | [**\SeaTable\Client\Base\UpdateViewFiltersInner[]**](UpdateViewFiltersInner.md) | filter of your view | [optional]
**filter_conjunction** | [**\SeaTable\Client\Base\FilterConjunction**](FilterConjunction.md) |  | [optional]
**sorts** | [**\SeaTable\Client\Base\SortsInner[]**](SortsInner.md) | sorting of your view | [optional]
**groupbys** | [**\SeaTable\Client\Base\SortsInner[]**](SortsInner.md) | grouping of your view | [optional]
**hidden_columns** | **string[]** | IDs of the columns that should be hidden | [optional]

