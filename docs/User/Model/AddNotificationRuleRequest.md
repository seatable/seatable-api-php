# # AddNotificationRuleRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**run_condition** | **string** | Defines whether the action is triggered by date or table update. For \&quot;Records near deadline\&quot; use \&quot;per_day\&quot;. For \&quot;Records modified\&quot; and \&quot;Records meet specific conditions after modification\&quot; use \&quot;per_update\&quot;. |
**trigger** | [**\SeaTable\Client\User\AddNotificationRuleRequestTrigger**](AddNotificationRuleRequestTrigger.md) |  |
**action** | [**\SeaTable\Client\User\AddNotificationRuleRequestAction**](AddNotificationRuleRequestAction.md) |  |

