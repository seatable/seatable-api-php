# # AddNotificationRuleRequestTrigger

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**rule_name** | **string** | The name of the rule. |
**table_id** | **string** | The ID of the table. |
**view_id** | **string** | The ID of the view. |
**condition** | **string** | The trigger condition type. Use \&quot;near_deadline\&quot; with \&quot;per_day\&quot; run_condition, \&quot;rows_modified\&quot; with \&quot;per_update\&quot;, and \&quot;filters_satisfy\&quot; with \&quot;per_update\&quot;. |
**date_column_name** | **string** | The date column used for deadline (required if condition is near_deadline). | [optional]
**alarm_days** | **int** | Days before deadline to trigger notification. | [optional]
**notify_hour** | **int** | Hour of day to send notification. | [optional]
**watch_all_columns** | **bool** | Whether to watch all columns for changes. | [optional] [default to true]
**column_keys** | **string[]** | List of specific column keys to watch. | [optional]
**filters** | [**\SeaTable\Client\User\FiltersInner[]**](FiltersInner.md) |  | [optional]
**filter_conjunction** | **string** | How filters are combined. | [optional]

