# OpenAPIClient-php

## API Endpoints - TeamAdmin

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ActivitiesLogsApi* | [**listTeamLogins**](docs/TeamAdmin/Api/ActivitiesLogsApi.md#listteamlogins) | **GET** /api/v2.1/org/{org_id}/admin/login-logs/ | List Team Logins
*ActivitiesLogsApi* | [**listTeamOperationLog**](docs/TeamAdmin/Api/ActivitiesLogsApi.md#listteamoperationlog) | **GET** /api/v2.1/org/{org_id}/admin/admin-logs/ | List Team Operations
*ActivitiesLogsApi* | [**listUserLogins**](docs/TeamAdmin/Api/ActivitiesLogsApi.md#listuserlogins) | **GET** /api/v2.1/org/{org_id}/admin/login-logs/{user_id} | List User Logins
*BasesApi* | [**clearTeamTrashBin**](docs/TeamAdmin/Api/BasesApi.md#clearteamtrashbin) | **DELETE** /api/v2.1/org/{org_id}/admin/trash-dtables/ | Clear Team Trash Bin
*BasesApi* | [**deleteBase**](docs/TeamAdmin/Api/BasesApi.md#deletebase) | **DELETE** /api/v2.1/org/{org_id}/admin/dtables/{base_id}/ | Delete Base
*BasesApi* | [**listBaseSharings**](docs/TeamAdmin/Api/BasesApi.md#listbasesharings) | **GET** /api/v2.1/org/{org_id}/admin/dtables/{base_uuid}/shares | List Base Sharings
*BasesApi* | [**listBases**](docs/TeamAdmin/Api/BasesApi.md#listbases) | **GET** /api/v2.1/org/{org_id}/admin/dtables/ | List Bases (Team)
*BasesApi* | [**listTrashBases**](docs/TeamAdmin/Api/BasesApi.md#listtrashbases) | **GET** /api/v2.1/org/{org_id}/admin/trash-dtables/ | List Trash Bases
*BasesApi* | [**restoreBaseFromTrash**](docs/TeamAdmin/Api/BasesApi.md#restorebasefromtrash) | **PUT** /api/v2.1/org/{org_id}/admin/trash-dtables/{base_id}/ | Restore Base from Trash
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
*InfoSettingsApi* | [**getTeamInfo**](docs/TeamAdmin/Api/InfoSettingsApi.md#getteaminfo) | **GET** /api/v2.1/org/admin/info/ | Get Team Info
*InfoSettingsApi* | [**getTeamSettings**](docs/TeamAdmin/Api/InfoSettingsApi.md#getteamsettings) | **GET** /api/v2.1/org/admin/settings/ | Get Team Settings
*InfoSettingsApi* | [**updateTeam**](docs/TeamAdmin/Api/InfoSettingsApi.md#updateteam) | **PUT** /api/v2.1/org/admin/info/ | Update Team
*InfoSettingsApi* | [**updateTeamSettings**](docs/TeamAdmin/Api/InfoSettingsApi.md#updateteamsettings) | **PUT** /api/v2.1/org/admin/settings/ | Update Team Settings
*SAMLApi* | [**getSamlConfig**](docs/TeamAdmin/Api/SAMLApi.md#getsamlconfig) | **GET** /api/v2.1/org/{org_id}/admin/saml-config/ | Get SAML Config
*SAMLApi* | [**updateSamlConfig**](docs/TeamAdmin/Api/SAMLApi.md#updatesamlconfig) | **PUT** /api/v2.1/org/{org_id}/admin/saml-config/ | Update SAML Config
*SAMLApi* | [**verifySamlDomain**](docs/TeamAdmin/Api/SAMLApi.md#verifysamldomain) | **PUT** /api/v2.1/org/{org_id}/admin/verify-domain/ | Verify SAML domain
*SharingLinksApi* | [**deleteExternalLink**](docs/TeamAdmin/Api/SharingLinksApi.md#deleteexternallink) | **DELETE** /api/v2.1/org/{org_id}/admin/external-links/{external_link_token}/ | Delete External Link
*SharingLinksApi* | [**deleteInviteLink**](docs/TeamAdmin/Api/SharingLinksApi.md#deleteinvitelink) | **DELETE** /api/v2.1/org/{org_id}/admin/invite-links/{invite_link_token}/ | Delete Invite Link
*SharingLinksApi* | [**deleteViewExternalLink**](docs/TeamAdmin/Api/SharingLinksApi.md#deleteviewexternallink) | **DELETE** /api/v2.1/org/{org_id}/admin/view-external-links/{view_external_link_token}/ | Delete View External Link
*SharingLinksApi* | [**listBaseExternalLinks**](docs/TeamAdmin/Api/SharingLinksApi.md#listbaseexternallinks) | **GET** /api/v2.1/org/{org_id}/admin/external-links/ | List Base External Links
*SharingLinksApi* | [**listInviteLinks**](docs/TeamAdmin/Api/SharingLinksApi.md#listinvitelinks) | **GET** /api/v2.1/org/{org_id}/admin/invite-links/ | List Invite Links
*SharingLinksApi* | [**listViewExternalLinks**](docs/TeamAdmin/Api/SharingLinksApi.md#listviewexternallinks) | **GET** /api/v2.1/org/{org_id}/admin/view-external-links/ | List View External Links
*SharingLinksApi* | [**updateInviteLink**](docs/TeamAdmin/Api/SharingLinksApi.md#updateinvitelink) | **PUT** /api/v2.1/org/{org_id}/admin/invite-links/{invite_link_token}/ | Update Invite Link
*UsersApi* | [**addUser**](docs/TeamAdmin/Api/UsersApi.md#adduser) | **POST** /api/v2.1/org/{org_id}/admin/users/ | Add User
*UsersApi* | [**deleteUser**](docs/TeamAdmin/Api/UsersApi.md#deleteuser) | **DELETE** /api/v2.1/org/{org_id}/admin/users/{user_id}/ | Delete User
*UsersApi* | [**disableTwoFactor**](docs/TeamAdmin/Api/UsersApi.md#disabletwofactor) | **DELETE** /api/v2.1/org/{org_id}/admin/users/{user_id}/two-factor-auth/ | Disable 2FA
*UsersApi* | [**enforceTwofactor**](docs/TeamAdmin/Api/UsersApi.md#enforcetwofactor) | **PUT** /api/v2.1/org/{org_id}/admin/users/{user_id}/two-factor-auth/ | Enforce 2FA
*UsersApi* | [**listTeamUsers**](docs/TeamAdmin/Api/UsersApi.md#listteamusers) | **GET** /api/v2.1/org/{org_id}/admin/users/ | List Users (Team)
*UsersApi* | [**resetUserPassword**](docs/TeamAdmin/Api/UsersApi.md#resetuserpassword) | **PUT** /api/v2.1/org/{org_id}/admin/users/{user_id}/set-password/ | Reset User Password
*UsersApi* | [**updateUser**](docs/TeamAdmin/Api/UsersApi.md#updateuser) | **PUT** /api/v2.1/org/{org_id}/admin/users/{user_id}/ | Update User


## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `4.4`
    - Generator version: `7.5.0-SNAPSHOT`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`