# OpenAPIClient-php

## API Endpoints - TeamAdmin

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ActivitiesLogsApi* | [**listAutomationLogs**](docs/TeamAdmin/Api/ActivitiesLogsApi.md#listautomationlogs) | **GET** /api/v2.1/org/{org_id}/admin/automation-logs/ | List Automation Logs
*ActivitiesLogsApi* | [**listFileAccessLogs**](docs/TeamAdmin/Api/ActivitiesLogsApi.md#listfileaccesslogs) | **GET** /api/v2.1/org/{org_id}/admin/file-access-logs/ | List File Access Logs
*ActivitiesLogsApi* | [**listGroupMemberAuditLogs**](docs/TeamAdmin/Api/ActivitiesLogsApi.md#listgroupmemberauditlogs) | **GET** /api/v2.1/org/{org_id}/admin/group-member-audit/ | List Group Member Audit Logs
*ActivitiesLogsApi* | [**listPythonRuns**](docs/TeamAdmin/Api/ActivitiesLogsApi.md#listpythonruns) | **GET** /api/v2.1/org/{org_id}/admin/python-runs/ | List Python Runs
*ActivitiesLogsApi* | [**listTeamLogins**](docs/TeamAdmin/Api/ActivitiesLogsApi.md#listteamlogins) | **GET** /api/v2.1/org/{org_id}/admin/login-logs/ | List Team Logins
*ActivitiesLogsApi* | [**listTeamOperationLog**](docs/TeamAdmin/Api/ActivitiesLogsApi.md#listteamoperationlog) | **GET** /api/v2.1/org/{org_id}/admin/admin-logs/ | List Team Operations
*ActivitiesLogsApi* | [**listUserLogins**](docs/TeamAdmin/Api/ActivitiesLogsApi.md#listuserlogins) | **GET** /api/v2.1/org/{org_id}/admin/login-logs/{user_id}/ | List User Logins
*BasesApi* | [**clearTeamTrashBin**](docs/TeamAdmin/Api/BasesApi.md#clearteamtrashbin) | **DELETE** /api/v2.1/org/{org_id}/admin/trash-dtables/ | Clear Team Trash Bin
*BasesApi* | [**deleteApiToken**](docs/TeamAdmin/Api/BasesApi.md#deleteapitoken) | **DELETE** /api/v2.1/org/{org_id}/admin/dtables/{base_uuid}/api-tokens/{app_name}/ | Delete API-Token
*BasesApi* | [**deleteBase**](docs/TeamAdmin/Api/BasesApi.md#deletebase) | **DELETE** /api/v2.1/org/{org_id}/admin/dtables/{base_uuid}/ | Delete Base
*BasesApi* | [**getBase**](docs/TeamAdmin/Api/BasesApi.md#getbase) | **GET** /api/v2.1/org/{org_id}/admin/dtables/{base_uuid}/ | Get Base
*BasesApi* | [**listApiTokens**](docs/TeamAdmin/Api/BasesApi.md#listapitokens) | **GET** /api/v2.1/org/{org_id}/admin/dtables/{base_uuid}/api-tokens/ | List API-Tokens
*BasesApi* | [**listApiTokensOfAllBases**](docs/TeamAdmin/Api/BasesApi.md#listapitokensofallbases) | **GET** /api/v2.1/org/{org_id}/admin/api-tokens/ | List API-Tokens of All Bases
*BasesApi* | [**listBaseSharings**](docs/TeamAdmin/Api/BasesApi.md#listbasesharings) | **GET** /api/v2.1/org/{org_id}/admin/dtables/{base_uuid}/shares/ | List Base Sharings
*BasesApi* | [**listBases**](docs/TeamAdmin/Api/BasesApi.md#listbases) | **GET** /api/v2.1/org/{org_id}/admin/dtables/ | List Bases (Team)
*BasesApi* | [**listTrashBases**](docs/TeamAdmin/Api/BasesApi.md#listtrashbases) | **GET** /api/v2.1/org/{org_id}/admin/trash-dtables/ | List Trash Bases
*BasesApi* | [**listUsersBases**](docs/TeamAdmin/Api/BasesApi.md#listusersbases) | **GET** /api/v2.1/org/{org_id}/admin/users/{user_id}/dtables/ | List User&#39;s Bases
*BasesApi* | [**restoreBaseFromTrash**](docs/TeamAdmin/Api/BasesApi.md#restorebasefromtrash) | **PUT** /api/v2.1/org/{org_id}/admin/trash-dtables/{base_uuid}/ | Restore Base from Trash
*BasesApi* | [**searchBase**](docs/TeamAdmin/Api/BasesApi.md#searchbase) | **GET** /api/v2.1/org/{org_id}/admin/search-dtables/ | Search Base
*CustomizingApi* | [**deleteTeamLogo**](docs/TeamAdmin/Api/CustomizingApi.md#deleteteamlogo) | **DELETE** /api/v2.1/org/{org_id}/admin/org-logo/ | Delete Team Logo
*CustomizingApi* | [**getTeamLogo**](docs/TeamAdmin/Api/CustomizingApi.md#getteamlogo) | **GET** /api/v2.1/org/{org_id}/admin/org-logo/ | Get Team Logo
*CustomizingApi* | [**updateTeamLogo**](docs/TeamAdmin/Api/CustomizingApi.md#updateteamlogo) | **POST** /api/v2.1/org/{org_id}/admin/org-logo/ | Update Team Logo
*GroupsApi* | [**addGroup**](docs/TeamAdmin/Api/GroupsApi.md#addgroup) | **POST** /api/v2.1/org/{org_id}/admin/groups/ | Add Group
*GroupsApi* | [**addGroupMembers**](docs/TeamAdmin/Api/GroupsApi.md#addgroupmembers) | **POST** /api/v2.1/org/{org_id}/admin/groups/{group_id}/members/ | Add Group Members
*GroupsApi* | [**deleteGroup**](docs/TeamAdmin/Api/GroupsApi.md#deletegroup) | **DELETE** /api/v2.1/org/{org_id}/admin/groups/{group_id}/ | Delete Group
*GroupsApi* | [**getGroup**](docs/TeamAdmin/Api/GroupsApi.md#getgroup) | **GET** /api/v2.1/org/{org_id}/admin/groups/{group_id}/ | Get Group
*GroupsApi* | [**listGroupBases**](docs/TeamAdmin/Api/GroupsApi.md#listgroupbases) | **GET** /api/v2.1/org/{org_id}/admin/groups/{group_id}/dtables/ | List Group Bases
*GroupsApi* | [**listGroupMembers**](docs/TeamAdmin/Api/GroupsApi.md#listgroupmembers) | **GET** /api/v2.1/org/{org_id}/admin/groups/{group_id}/members/ | List Group Members
*GroupsApi* | [**listGroups**](docs/TeamAdmin/Api/GroupsApi.md#listgroups) | **GET** /api/v2.1/org/{org_id}/admin/groups/ | List Groups (Team)
*GroupsApi* | [**orderGroups**](docs/TeamAdmin/Api/GroupsApi.md#ordergroups) | **PUT** /api/v2.1/groups/move-group/ | Re-order Your Groups
*GroupsApi* | [**removeGroupMembers**](docs/TeamAdmin/Api/GroupsApi.md#removegroupmembers) | **DELETE** /api/v2.1/org/{org_id}/admin/groups/{group_id}/members/{user_id}/ | Remove Group Members
*GroupsApi* | [**updateGroup**](docs/TeamAdmin/Api/GroupsApi.md#updategroup) | **PUT** /api/v2.1/org/{org_id}/admin/groups/{group_id}/ | Update Group
*GroupsApi* | [**updateGroupMemberRole**](docs/TeamAdmin/Api/GroupsApi.md#updategroupmemberrole) | **PUT** /api/v2.1/org/{org_id}/admin/groups/{group_id}/members/{user_id}/ | Update Group Member Role
*InfoSettingsApi* | [**deleteTeam**](docs/TeamAdmin/Api/InfoSettingsApi.md#deleteteam) | **DELETE** /api/v2.1/org/admin/ | Delete Team
*InfoSettingsApi* | [**getTeamInfo**](docs/TeamAdmin/Api/InfoSettingsApi.md#getteaminfo) | **GET** /api/v2.1/org/admin/info/ | Get Team Info
*InfoSettingsApi* | [**getTeamSettings**](docs/TeamAdmin/Api/InfoSettingsApi.md#getteamsettings) | **GET** /api/v2.1/org/admin/settings/ | Get Team Settings
*InfoSettingsApi* | [**updateTeam**](docs/TeamAdmin/Api/InfoSettingsApi.md#updateteam) | **PUT** /api/v2.1/org/admin/info/ | Update Team
*InfoSettingsApi* | [**updateTeamSettings**](docs/TeamAdmin/Api/InfoSettingsApi.md#updateteamsettings) | **PUT** /api/v2.1/org/admin/settings/ | Update Team Settings
*SAMLApi* | [**deleteSamlConfig**](docs/TeamAdmin/Api/SAMLApi.md#deletesamlconfig) | **DELETE** /api/v2.1/org/{org_id}/admin/saml-config/ | Delete SAML Config
*SAMLApi* | [**getSamlConfig**](docs/TeamAdmin/Api/SAMLApi.md#getsamlconfig) | **GET** /api/v2.1/org/{org_id}/admin/saml-config/ | Get SAML Config
*SAMLApi* | [**updateSamlConfig**](docs/TeamAdmin/Api/SAMLApi.md#updatesamlconfig) | **PUT** /api/v2.1/org/{org_id}/admin/saml-config/ | Update SAML Config
*SAMLApi* | [**verifySamlDomain**](docs/TeamAdmin/Api/SAMLApi.md#verifysamldomain) | **PUT** /api/v2.1/org/{org_id}/admin/verify-domain/ | Verify SAML domain
*SharingLinksApi* | [**deleteExternalLink**](docs/TeamAdmin/Api/SharingLinksApi.md#deleteexternallink) | **DELETE** /api/v2.1/org/{org_id}/admin/external-links/{external_link_token}/ | Delete External Link
*SharingLinksApi* | [**deleteInviteLink**](docs/TeamAdmin/Api/SharingLinksApi.md#deleteinvitelink) | **DELETE** /api/v2.1/org/{org_id}/admin/invite-links/{invite_link_token}/ | Delete Invite Link
*SharingLinksApi* | [**deleteViewExternalLink**](docs/TeamAdmin/Api/SharingLinksApi.md#deleteviewexternallink) | **DELETE** /api/v2.1/org/{org_id}/admin/view-external-links/{view_external_link_token}/ | Delete View External Link
*SharingLinksApi* | [**listBaseExternalLinks**](docs/TeamAdmin/Api/SharingLinksApi.md#listbaseexternallinks) | **GET** /api/v2.1/org/{org_id}/admin/external-links/ | List Base External Links
*SharingLinksApi* | [**listInviteLinks**](docs/TeamAdmin/Api/SharingLinksApi.md#listinvitelinks) | **GET** /api/v2.1/org/{org_id}/admin/invite-links/ | List Invite Links
*SharingLinksApi* | [**listShares**](docs/TeamAdmin/Api/SharingLinksApi.md#listshares) | **GET** /api/v2.1/org/{org_id}/admin/shares/ | List Shares
*SharingLinksApi* | [**listViewExternalLinks**](docs/TeamAdmin/Api/SharingLinksApi.md#listviewexternallinks) | **GET** /api/v2.1/org/{org_id}/admin/view-external-links/ | List View External Links
*SharingLinksApi* | [**updateInviteLink**](docs/TeamAdmin/Api/SharingLinksApi.md#updateinvitelink) | **PUT** /api/v2.1/org/{org_id}/admin/invite-links/{invite_link_token}/ | Update Invite Link
*StatisticsApi* | [**getAdminLogStatisticsByDay**](docs/TeamAdmin/Api/StatisticsApi.md#getadminlogstatisticsbyday) | **GET** /api/v2.1/org/{org_id}/admin/statistics/admin-logs/by-day/ | Admin Logs (by Day)
*StatisticsApi* | [**getAutomationLogStatisticsByBase**](docs/TeamAdmin/Api/StatisticsApi.md#getautomationlogstatisticsbybase) | **GET** /api/v2.1/org/{org_id}/admin/statistics/automation-logs/by-base/ | Automation Logs (by Base)
*StatisticsApi* | [**getAutomationLogStatisticsByDay**](docs/TeamAdmin/Api/StatisticsApi.md#getautomationlogstatisticsbyday) | **GET** /api/v2.1/org/{org_id}/admin/statistics/automation-logs/by-day/ | Automation Logs (by Day)
*StatisticsApi* | [**getLoginLogStatisticsByDay**](docs/TeamAdmin/Api/StatisticsApi.md#getloginlogstatisticsbyday) | **GET** /api/v2.1/org/{org_id}/admin/statistics/login-logs/by-day/ | Login Logs (by Day)
*StatisticsApi* | [**getPythonRunStatisticsByBase**](docs/TeamAdmin/Api/StatisticsApi.md#getpythonrunstatisticsbybase) | **GET** /api/v2.1/org/{org_id}/admin/statistics/python-runs/by-base/ | Python Runs (by Base)
*StatisticsApi* | [**getPythonRunStatisticsByDay**](docs/TeamAdmin/Api/StatisticsApi.md#getpythonrunstatisticsbyday) | **GET** /api/v2.1/org/{org_id}/admin/statistics/python-runs/by-day/ | Python Runs (by Day)
*UsersApi* | [**addUser**](docs/TeamAdmin/Api/UsersApi.md#adduser) | **POST** /api/v2.1/org/{org_id}/admin/users/ | Add User
*UsersApi* | [**deleteUser**](docs/TeamAdmin/Api/UsersApi.md#deleteuser) | **DELETE** /api/v2.1/org/{org_id}/admin/users/{user_id}/ | Delete User
*UsersApi* | [**disableTwoFactor**](docs/TeamAdmin/Api/UsersApi.md#disabletwofactor) | **DELETE** /api/v2.1/org/{org_id}/admin/users/{user_id}/two-factor-auth/ | Disable 2FA
*UsersApi* | [**enforceTwofactor**](docs/TeamAdmin/Api/UsersApi.md#enforcetwofactor) | **PUT** /api/v2.1/org/{org_id}/admin/users/{user_id}/two-factor-auth/ | Enforce 2FA
*UsersApi* | [**getUser**](docs/TeamAdmin/Api/UsersApi.md#getuser) | **GET** /api/v2.1/org/{org_id}/admin/users/{user_id}/ | Get User
*UsersApi* | [**listTeamUsers**](docs/TeamAdmin/Api/UsersApi.md#listteamusers) | **GET** /api/v2.1/org/{org_id}/admin/users/ | List Users (Team)
*UsersApi* | [**resetUserPassword**](docs/TeamAdmin/Api/UsersApi.md#resetuserpassword) | **PUT** /api/v2.1/org/{org_id}/admin/users/{user_id}/set-password/ | Reset User Password
*UsersApi* | [**updateUser**](docs/TeamAdmin/Api/UsersApi.md#updateuser) | **PUT** /api/v2.1/org/{org_id}/admin/users/{user_id}/ | Update User


## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `6.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`