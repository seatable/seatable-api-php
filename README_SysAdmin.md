# OpenAPIClient-php

## API Endpoints - SysAdmin

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AutomationsApi* | [**deleteAutomation**](docs/SysAdmin/Api/AutomationsApi.md#deleteautomation) | **DELETE** /api/v2.1/admin/automation-rules/{automation_rule_id}/ | Delete Automation
*AutomationsApi* | [**deleteInvalidAutomations**](docs/SysAdmin/Api/AutomationsApi.md#deleteinvalidautomations) | **DELETE** /api/v2.1/admin/invalid-automation-rules/ | Delete Invalid Automations
*AutomationsApi* | [**listAutomations**](docs/SysAdmin/Api/AutomationsApi.md#listautomations) | **GET** /api/v2.1/admin/automation-rules/ | List Automations
*AutomationsApi* | [**listInvalidAutomations**](docs/SysAdmin/Api/AutomationsApi.md#listinvalidautomations) | **GET** /api/v2.1/admin/invalid-automation-rules/ | List Invalid Automations
*BasesApi* | [**deleteBase**](docs/SysAdmin/Api/BasesApi.md#deletebase) | **DELETE** /api/v2.1/admin/dtable/{base_uuid}/ | Delete Base
*BasesApi* | [**deleteBasePassword**](docs/SysAdmin/Api/BasesApi.md#deletebasepassword) | **PUT** /api/v2.1/admin/dtable/{base_uuid}/unset-password/ | Delete Base Password
*BasesApi* | [**listAllBases**](docs/SysAdmin/Api/BasesApi.md#listallbases) | **GET** /api/v2.1/admin/dtables/ | List All Bases
*BasesApi* | [**listBaseNotifications**](docs/SysAdmin/Api/BasesApi.md#listbasenotifications) | **GET** /api/v2.1/admin/dtable-notifications/ | List Notifications
*BasesApi* | [**listTrashedBases**](docs/SysAdmin/Api/BasesApi.md#listtrashedbases) | **GET** /api/v2.1/admin/trash-dtables/ | List Trashed Bases
*BasesApi* | [**listUsersBases**](docs/SysAdmin/Api/BasesApi.md#listusersbases) | **GET** /api/v2.1/admin/users/{user_id}/dtables/ | List User&#39;s Bases
*BasesApi* | [**restoreTrashedBase**](docs/SysAdmin/Api/BasesApi.md#restoretrashedbase) | **PUT** /api/v2.1/admin/trash-dtables/{base_id}/ | Restore Trashed Base
*CommonDatasetApi* | [**deleteInvalidSync**](docs/SysAdmin/Api/CommonDatasetApi.md#deleteinvalidsync) | **DELETE** /api/v2.1/admin/common-dataset/sync/{sync_id}/ | Delete Invalid Sync
*CommonDatasetApi* | [**deleteInvalidSyncs**](docs/SysAdmin/Api/CommonDatasetApi.md#deleteinvalidsyncs) | **DELETE** /api/v2.1/admin/common-dataset/invalid-syncs/ | Delete Invalid Syncs
*CommonDatasetApi* | [**listCommonDataset**](docs/SysAdmin/Api/CommonDatasetApi.md#listcommondataset) | **GET** /api/v2.1/admin/common-datasets/ | List Common Dataset
*CommonDatasetApi* | [**listCommonDatasetSyncs**](docs/SysAdmin/Api/CommonDatasetApi.md#listcommondatasetsyncs) | **GET** /api/v2.1/admin/common-dataset/periodical-syncs/ | List Common Dataset Syncs
*CommonDatasetApi* | [**listInvalidSyncs**](docs/SysAdmin/Api/CommonDatasetApi.md#listinvalidsyncs) | **GET** /api/v2.1/admin/common-dataset/invalid-syncs/ | List invalid Syncs
*DepartmentsApi* | [**addDepartment**](docs/SysAdmin/Api/DepartmentsApi.md#adddepartment) | **POST** /api/v2.1/admin/address-book/groups/ | Add Department
*DepartmentsApi* | [**deleteDepartment**](docs/SysAdmin/Api/DepartmentsApi.md#deletedepartment) | **DELETE** /api/v2.1/admin/address-book/groups/{department_id}/ | Delete Department
*DepartmentsApi* | [**getDepartments**](docs/SysAdmin/Api/DepartmentsApi.md#getdepartments) | **GET** /api/v2.1/admin/address-book/groups/{department_id}/ | Get Department
*DepartmentsApi* | [**listDepartments**](docs/SysAdmin/Api/DepartmentsApi.md#listdepartments) | **GET** /api/v2.1/admin/address-book/groups/{parent_department_id}/ | List Departments
*ExportApi* | [**exportBase**](docs/SysAdmin/Api/ExportApi.md#exportbase) | **GET** /api/v2.1/admin/dtables/{base_uuid}/synchronous-export/export-dtable/ | Export base
*FormsApi* | [**deleteDataCollectionForms**](docs/SysAdmin/Api/FormsApi.md#deletedatacollectionforms) | **DELETE** /api/v2.1/admin/collection-tables/{collection_table_token}/ | Delete Data Collection Forms
*FormsApi* | [**deleteForm**](docs/SysAdmin/Api/FormsApi.md#deleteform) | **DELETE** /api/v2.1/admin/forms/{form_token}/ | Delete Form
*FormsApi* | [**listDataCollectionForms**](docs/SysAdmin/Api/FormsApi.md#listdatacollectionforms) | **GET** /api/v2.1/admin/collection-tables/ | List Data Collection Forms
*FormsApi* | [**listForms**](docs/SysAdmin/Api/FormsApi.md#listforms) | **GET** /api/v2.1/admin/forms/ | List Forms
*GroupsApi* | [**createGroup**](docs/SysAdmin/Api/GroupsApi.md#creategroup) | **POST** /api/v2.1/admin/groups/ | Create Group
*GroupsApi* | [**deleteGroup**](docs/SysAdmin/Api/GroupsApi.md#deletegroup) | **DELETE** /api/v2.1/admin/groups/{group_id}/ | Delete Group
*GroupsApi* | [**listGroups**](docs/SysAdmin/Api/GroupsApi.md#listgroups) | **GET** /api/v2.1/admin/groups/ | List Groups
*GroupsApi* | [**transferGroup**](docs/SysAdmin/Api/GroupsApi.md#transfergroup) | **PUT** /api/v2.1/admin/groups/{group_id}/ | Transfer Group
*LogsApi* | [**listAbuseReports**](docs/SysAdmin/Api/LogsApi.md#listabusereports) | **GET** /api/v2.1/admin/abuse-reports/ | List Abuse Reports
*LogsApi* | [**listEmailLogs**](docs/SysAdmin/Api/LogsApi.md#listemaillogs) | **GET** /api/v2.1/admin/email-sending-logs/ | List Email Logs
*LogsApi* | [**listLoginLogs**](docs/SysAdmin/Api/LogsApi.md#listloginlogs) | **GET** /api/v2.1/admin/logs/login-logs/ | List Login Logs
*LogsApi* | [**listRegistrationLogs**](docs/SysAdmin/Api/LogsApi.md#listregistrationlogs) | **GET** /api/v2.1/admin/registration-logs/ | List Registration Logs
*LogsApi* | [**updateAbuseReport**](docs/SysAdmin/Api/LogsApi.md#updateabusereport) | **PUT** /api/v2.1/admin/abuse-reports/{abuse_report_id}/ | Update Abuse Report
*NotificationsApi* | [**deleteInvalidNotifications**](docs/SysAdmin/Api/NotificationsApi.md#deleteinvalidnotifications) | **DELETE** /api/v2.1/admin/invalid-notification-rules/ | Delete Invalid Notifications
*NotificationsApi* | [**deleteNotificationRule**](docs/SysAdmin/Api/NotificationsApi.md#deletenotificationrule) | **DELETE** /api/v2.1/admin/notification-rules/{notification_rule_id}/ | Delete Notification
*NotificationsApi* | [**listInvalidNotifications**](docs/SysAdmin/Api/NotificationsApi.md#listinvalidnotifications) | **GET** /api/v2.1/admin/invalid-notification-rules/ | List Invalid Notifications
*NotificationsApi* | [**listNotificationRules**](docs/SysAdmin/Api/NotificationsApi.md#listnotificationrules) | **GET** /api/v2.1/admin/notification-rules/ | List Notification Rules
*PluginsApi* | [**addPlugin**](docs/SysAdmin/Api/PluginsApi.md#addplugin) | **POST** /api/v2.1/admin/dtable-system-plugins/ | Add Plugin
*PluginsApi* | [**deletePlugin**](docs/SysAdmin/Api/PluginsApi.md#deleteplugin) | **DELETE** /api/v2.1/admin/dtable-system-plugins/{plugin_id}/ | Delete Plugin
*PluginsApi* | [**listPlugins**](docs/SysAdmin/Api/PluginsApi.md#listplugins) | **GET** /api/v2.1/admin/dtable-system-plugins/ | List Plugins
*PluginsApi* | [**listPluginsInstallCount**](docs/SysAdmin/Api/PluginsApi.md#listpluginsinstallcount) | **GET** /api/v2.1/admin/plugins-install-count/ | List Plugins Install Count
*PluginsApi* | [**updatePlugin**](docs/SysAdmin/Api/PluginsApi.md#updateplugin) | **PUT** /api/v2.1/admin/dtable-system-plugins/{plugin_id}/ | Update Plugin
*SharingLinksApi* | [**deleteBaseExternalLink**](docs/SysAdmin/Api/SharingLinksApi.md#deletebaseexternallink) | **DELETE** /api/v2.1/admin/external-links/{external_link_token}/ | Delete Base External Link
*SharingLinksApi* | [**deleteViewExternalLink**](docs/SysAdmin/Api/SharingLinksApi.md#deleteviewexternallink) | **DELETE** /api/v2.1/admin/view-external-links/{view_external_link_token}/ | Delete View External Link
*SharingLinksApi* | [**listBaseExternalLinks**](docs/SysAdmin/Api/SharingLinksApi.md#listbaseexternallinks) | **GET** /api/v2.1/admin/dtable/{base_id}/external-links/ | List Base External Links
*SharingLinksApi* | [**listExternalLinks**](docs/SysAdmin/Api/SharingLinksApi.md#listexternallinks) | **GET** /api/v2.1/admin/external-links/ | List External Links
*SharingLinksApi* | [**listViewExternalLinks**](docs/SysAdmin/Api/SharingLinksApi.md#listviewexternallinks) | **GET** /api/v2.1/admin/view-external-links/ | List View External Links
*StatisticsApi* | [**getActiveUsersPerDay**](docs/SysAdmin/Api/StatisticsApi.md#getactiveusersperday) | **GET** /api/v2.1/admin/statistics/active-users/ | Get Active Users (per Day)
*StatisticsApi* | [**getAutomationRules**](docs/SysAdmin/Api/StatisticsApi.md#getautomationrules) | **GET** /api/v2.1/admin/statistics/auto-rules/ | Get Automation Rules
*StatisticsApi* | [**getExternalApps**](docs/SysAdmin/Api/StatisticsApi.md#getexternalapps) | **GET** /api/v2.1/admin/statistics/external-apps/ | Get External Apps
*StatisticsApi* | [**getScriptRunningCountByUser**](docs/SysAdmin/Api/StatisticsApi.md#getscriptrunningcountbyuser) | **GET** /api/v2.1/admin/statistics/scripts-running/ | Get Script Running Count by User
*StatisticsApi* | [**listActiveUsersByDay**](docs/SysAdmin/Api/StatisticsApi.md#listactiveusersbyday) | **GET** /api/v2.1/admin/daily-active-users/ | List Active Users (one Day)
*StatisticsApi* | [**listScriptTasks**](docs/SysAdmin/Api/StatisticsApi.md#listscripttasks) | **GET** /api/v2.1/admin/scripts-tasks/ | List Scripts Tasks
*SystemInfoCustomizingApi* | [**getSystemInformation**](docs/SysAdmin/Api/SystemInfoCustomizingApi.md#getsysteminformation) | **GET** /api/v2.1/admin/sysinfo/ | Get system information
*SystemInfoCustomizingApi* | [**updateFavicon**](docs/SysAdmin/Api/SystemInfoCustomizingApi.md#updatefavicon) | **POST** /api/v2.1/admin/favicon/ | Update Favicon
*SystemInfoCustomizingApi* | [**updateGeneralSettings**](docs/SysAdmin/Api/SystemInfoCustomizingApi.md#updategeneralsettings) | **PUT** /api/v2.1/admin/web-settings/ | Update General Settings
*SystemInfoCustomizingApi* | [**updateLoginBackgroundImage**](docs/SysAdmin/Api/SystemInfoCustomizingApi.md#updateloginbackgroundimage) | **POST** /api/v2.1/admin/login-background-image/ | Update Login Background Image
*SystemInfoCustomizingApi* | [**updateLogo**](docs/SysAdmin/Api/SystemInfoCustomizingApi.md#updatelogo) | **POST** /api/v2.1/admin/logo/ | Update Logo
*SystemNotificationsApi* | [**addNotificationToUser**](docs/SysAdmin/Api/SystemNotificationsApi.md#addnotificationtouser) | **POST** /api/v2.1/admin/sys-user-notifications/ | Add Notification to User
*SystemNotificationsApi* | [**deleteNotification**](docs/SysAdmin/Api/SystemNotificationsApi.md#deletenotification) | **DELETE** /api/v2.1/admin/sys-user-notifications/{sys_notification_id}/ | Delete Notification
*SystemNotificationsApi* | [**listNotifications**](docs/SysAdmin/Api/SystemNotificationsApi.md#listnotifications) | **GET** /api/v2.1/admin/sys-user-notifications/ | List Notifications
*TeamsApi* | [**addTeam**](docs/SysAdmin/Api/TeamsApi.md#addteam) | **POST** /api/v2.1/admin/organizations/ | Add Team
*TeamsApi* | [**addTeamUser**](docs/SysAdmin/Api/TeamsApi.md#addteamuser) | **POST** /api/v2.1/admin/organizations/{org_id}/users/ | Add Team User
*TeamsApi* | [**deleteTeam**](docs/SysAdmin/Api/TeamsApi.md#deleteteam) | **DELETE** /api/v2.1/admin/organizations/{org_id}/ | Delete Team
*TeamsApi* | [**deleteTeamGroup**](docs/SysAdmin/Api/TeamsApi.md#deleteteamgroup) | **DELETE** /api/v2.1/admin/organizations/{org_id}/groups/{group_id}/ | Delete Group
*TeamsApi* | [**deleteTeamUser**](docs/SysAdmin/Api/TeamsApi.md#deleteteamuser) | **DELETE** /api/v2.1/admin/organizations/{org_id}/users/{user_id}/ | Delete Team User
*TeamsApi* | [**getOrganizationNames**](docs/SysAdmin/Api/TeamsApi.md#getorganizationnames) | **GET** /api/v2.1/admin/organizations-basic-info/ | Get Organization Names
*TeamsApi* | [**listTeamBases**](docs/SysAdmin/Api/TeamsApi.md#listteambases) | **GET** /api/v2.1/admin/organizations/{org_id}/dtables/ | List Team Bases
*TeamsApi* | [**listTeamGroups**](docs/SysAdmin/Api/TeamsApi.md#listteamgroups) | **GET** /api/v2.1/admin/organizations/{org_id}/groups/ | List Team Groups
*TeamsApi* | [**listTeamUsers**](docs/SysAdmin/Api/TeamsApi.md#listteamusers) | **GET** /api/v2.1/admin/organizations/{org_id}/users/ | List Team Users
*TeamsApi* | [**listTeams**](docs/SysAdmin/Api/TeamsApi.md#listteams) | **GET** /api/v2.1/admin/organizations/ | List Teams
*TeamsApi* | [**searchTeam**](docs/SysAdmin/Api/TeamsApi.md#searchteam) | **GET** /api/v2.1/admin/organizations/{org_id}/ | Search Team
*TeamsApi* | [**updateTeam**](docs/SysAdmin/Api/TeamsApi.md#updateteam) | **PUT** /api/v2.1/admin/organizations/{org_id}/ | Update Team
*TeamsApi* | [**updateTeamUser**](docs/SysAdmin/Api/TeamsApi.md#updateteamuser) | **PUT** /api/v2.1/admin/organizations/{org_id}/users/{user_id}/ | Update Team User
*UsersApi* | [**addNewUser**](docs/SysAdmin/Api/UsersApi.md#addnewuser) | **POST** /api/v2.1/admin/users/ | Add New User
*UsersApi* | [**deleteUser**](docs/SysAdmin/Api/UsersApi.md#deleteuser) | **DELETE** /api/v2.1/admin/users/{user_id}/ | Delete User
*UsersApi* | [**disableTwoFactor**](docs/SysAdmin/Api/UsersApi.md#disabletwofactor) | **DELETE** /api2/two-factor-auth/{user_id}/ | Disable 2FA
*UsersApi* | [**enforceTwoFactor**](docs/SysAdmin/Api/UsersApi.md#enforcetwofactor) | **PUT** /api/v2.1/admin/users/{user_id}/two-factor-auth/ | Enforce 2FA
*UsersApi* | [**getUser**](docs/SysAdmin/Api/UsersApi.md#getuser) | **GET** /api/v2.1/admin/users/{user_id}/ | Get User
*UsersApi* | [**importUsers**](docs/SysAdmin/Api/UsersApi.md#importusers) | **POST** /api/v2.1/admin/import-users/ | Import users
*UsersApi* | [**listAdminUsers**](docs/SysAdmin/Api/UsersApi.md#listadminusers) | **GET** /api/v2.1/admin/admin-users/ | List Admin Users
*UsersApi* | [**listBasesSharedToUser**](docs/SysAdmin/Api/UsersApi.md#listbasessharedtouser) | **GET** /api/v2.1/admin/users/{user_id}/shared-dtables/ | List Bases Shared to User
*UsersApi* | [**listUserStorageObjects**](docs/SysAdmin/Api/UsersApi.md#listuserstorageobjects) | **GET** /api/v2.1/admin/users/{user_id}/storage/ | List User&#39;s Storage Objects
*UsersApi* | [**listUsers**](docs/SysAdmin/Api/UsersApi.md#listusers) | **GET** /api/v2.1/admin/users/ | List Users
*UsersApi* | [**resetUserPassword**](docs/SysAdmin/Api/UsersApi.md#resetuserpassword) | **PUT** /api/v2.1/admin/users/{user_id}/reset-password/ | Reset User&#39;s Password
*UsersApi* | [**searchUser**](docs/SysAdmin/Api/UsersApi.md#searchuser) | **GET** /api/v2.1/admin/search-user/ | Search User / Users
*UsersApi* | [**searchUserByOrgId**](docs/SysAdmin/Api/UsersApi.md#searchuserbyorgid) | **GET** /api/v2.1/admin/search-user-by-org-id/ | Search User by Org-ID
*UsersApi* | [**updateAdminRole**](docs/SysAdmin/Api/UsersApi.md#updateadminrole) | **PUT** /api/v2.1/admin/admin-role/ | Update Admin&#39;s Role
*UsersApi* | [**updateUser**](docs/SysAdmin/Api/UsersApi.md#updateuser) | **PUT** /api/v2.1/admin/users/{user_id}/ | Update User


## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `5.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`