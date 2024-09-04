# OpenAPIClient-php

## API Endpoints - User

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ActivitiesLogsApi* | [**getBaseActivities**](docs/User/Api/ActivitiesLogsApi.md#getbaseactivities) | **GET** /api/v2.1/dtable-activities/ | Get Base Activities
*ActivitiesLogsApi* | [**getBaseActivityDetails**](docs/User/Api/ActivitiesLogsApi.md#getbaseactivitydetails) | **GET** /api/v2.1/dtable-activities/detail | Get Base Activity Details
*AppsApi* | [**changeAppStatus**](docs/User/Api/AppsApi.md#changeappstatus) | **PUT** /api/v2.1/external-apps/{app_token}/status/ | Change App Status
*AppsApi* | [**importUsersToApp**](docs/User/Api/AppsApi.md#importuserstoapp) | **POST** /api/v2.1/universal-apps/{app_token}/app-users/batch/ | Import Users to App
*AppsApi* | [**listAppInviteLinks**](docs/User/Api/AppsApi.md#listappinvitelinks) | **GET** /api/v2.1/universal-apps/{app_token}/invite-links/ | List App Invite Links
*AppsApi* | [**listApps**](docs/User/Api/AppsApi.md#listapps) | **GET** /api/v2.1/universal-apps/ | List Apps
*AppsApi* | [**listUniversalAppUsers**](docs/User/Api/AppsApi.md#listuniversalappusers) | **GET** /api/v2.1/universal-apps/{app_token}/app-users/ | List Universal App Users
*AttachmentApi* | [**checkIfAssetExists**](docs/User/Api/AttachmentApi.md#checkifassetexists) | **GET** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/asset-exists/ | Check If Asset Exists
*AttachmentApi* | [**deleteBaseAsset**](docs/User/Api/AttachmentApi.md#deletebaseasset) | **DELETE** /api/v2.1/dtable-asset/{base_uuid}/ | Delete Base Asset
*AttachmentApi* | [**deleteBaseAssets**](docs/User/Api/AttachmentApi.md#deletebaseassets) | **DELETE** /api/v2.1/dtable-asset/{base_uuid}/batch-delete-assets/ | Delete Base Assets
*AttachmentApi* | [**getBaseAttachmentUploadLink**](docs/User/Api/AttachmentApi.md#getbaseattachmentuploadlink) | **GET** /api/v2.1/workspace/{workspace_id}/dtable-asset-upload-link/ | Get Base Attachment Upload Link
*AttachmentApi* | [**listBaseAssets**](docs/User/Api/AttachmentApi.md#listbaseassets) | **GET** /api/v2.1/dtable-asset/{base_uuid}/ | List Base Asset Directories And Files
*AttachmentApi* | [**listRecentlyUploadedFiles**](docs/User/Api/AttachmentApi.md#listrecentlyuploadedfiles) | **GET** /api/v2.1/dtable-recent-asset/{base_uuid}/ | List Recently Uploaded Files
*AttachmentApi* | [**renameBaseAsset**](docs/User/Api/AttachmentApi.md#renamebaseasset) | **POST** /api/v2.1/dtable-asset/{base_uuid}/rename/ | Rename Base Asset
*AutomationsApi* | [**createAutomationRule**](docs/User/Api/AutomationsApi.md#createautomationrule) | **POST** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/automation-rules/ | Create Automation Rule
*AutomationsApi* | [**deleteAutomationRule**](docs/User/Api/AutomationsApi.md#deleteautomationrule) | **DELETE** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/automation-rules/{automation_rule_id}/ | Delete Automation Rule
*AutomationsApi* | [**listAutomationRules**](docs/User/Api/AutomationsApi.md#listautomationrules) | **GET** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/automation-rules/ | List Automation Rules
*AutomationsApi* | [**updateAutomationRule**](docs/User/Api/AutomationsApi.md#updateautomationrule) | **PUT** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/automation-rules/{automation_rule_id}/ | Update Automation Rule
*BasesApi* | [**basePassword**](docs/User/Api/BasesApi.md#basepassword) | **PUT** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/password/ | Base Password
*BasesApi* | [**clearTrash**](docs/User/Api/BasesApi.md#cleartrash) | **DELETE** /api/v2.1/trash-dtables/ | Clear Trash
*BasesApi* | [**createBase**](docs/User/Api/BasesApi.md#createbase) | **POST** /api/v2.1/dtables/ | Create Base
*BasesApi* | [**createFolder**](docs/User/Api/BasesApi.md#createfolder) | **POST** /api/v2.1/workspace/{workspace_id}/folders/ | Create Folder
*BasesApi* | [**deleteBase**](docs/User/Api/BasesApi.md#deletebase) | **DELETE** /api/v2.1/workspace/{workspace_id}/dtable/ | Delete Base
*BasesApi* | [**deleteFolder**](docs/User/Api/BasesApi.md#deletefolder) | **DELETE** /api/v2.1/workspace/{workspace_id}/folders/{folder_id}/ | Delete Folder
*BasesApi* | [**favoriteBase**](docs/User/Api/BasesApi.md#favoritebase) | **POST** /api/v2.1/starred-dtables/ | Favorite Base
*BasesApi* | [**listBases**](docs/User/Api/BasesApi.md#listbases) | **GET** /api/v2.1/user-admin-dtables/ | List Bases
*BasesApi* | [**listFavorites**](docs/User/Api/BasesApi.md#listfavorites) | **GET** /api/v2.1/starred-dtables/ | List Favorites
*BasesApi* | [**listGroupTrashedBases**](docs/User/Api/BasesApi.md#listgrouptrashedbases) | **GET** /api/v2.1/groups/{group_id}/trash-dtables/ | List Group Trashed Bases
*BasesApi* | [**listTrashedBases**](docs/User/Api/BasesApi.md#listtrashedbases) | **GET** /api/v2.1/trash-dtables/ | List Trashed Bases
*BasesApi* | [**moveBaseIntoFolder**](docs/User/Api/BasesApi.md#movebaseintofolder) | **POST** /api/v2.1/workspace/{workspace_id}/folder-item-moving/ | Move Base into Folder
*BasesApi* | [**restoreGroupTrashedBase**](docs/User/Api/BasesApi.md#restoregrouptrashedbase) | **PUT** /api/v2.1/groups/{group_id}/trash-dtables/{base_uuid}/ | Restore Group Trashed Base
*BasesApi* | [**restoreTrashedBase**](docs/User/Api/BasesApi.md#restoretrashedbase) | **PUT** /api/v2.1/trash-dtables/{trashed_base_id}/ | Restore Trashed Base
*BasesApi* | [**searchBaseOrApps**](docs/User/Api/BasesApi.md#searchbaseorapps) | **GET** /api/v2.1/dtable/items-search/ | Search base or apps
*BasesApi* | [**unfavoriteBase**](docs/User/Api/BasesApi.md#unfavoritebase) | **DELETE** /api/v2.1/starred-dtables/ | Unfavorite Base
*BasesApi* | [**updateBase**](docs/User/Api/BasesApi.md#updatebase) | **PUT** /api/v2.1/workspace/{workspace_id}/dtable/ | Update Base
*BasesApi* | [**updateFolder**](docs/User/Api/BasesApi.md#updatefolder) | **PUT** /api/v2.1/workspace/{workspace_id}/folders/{folder_id}/ | Update Folder
*CommonDatasetApi* | [**deleteCommonDataset**](docs/User/Api/CommonDatasetApi.md#deletecommondataset) | **DELETE** /api/v2.1/dtable/common-datasets/{dataset_id}/ | Delete Common Dataset
*CommonDatasetApi* | [**getCommonDataset**](docs/User/Api/CommonDatasetApi.md#getcommondataset) | **GET** /api/v2.1/dtable/common-datasets/{dataset_id}/ | Get Common Dataset
*CommonDatasetApi* | [**getCommonDatasetInfo**](docs/User/Api/CommonDatasetApi.md#getcommondatasetinfo) | **GET** /api/v2.1/dtable/common-datasets/{dataset_id}/info/ | Get Common Dataset Info
*CommonDatasetApi* | [**importCommonDataset**](docs/User/Api/CommonDatasetApi.md#importcommondataset) | **POST** /api/v2.1/dtable/common-datasets/{dataset_id}/import/ | Import Common Dataset
*CommonDatasetApi* | [**listCommonDataset**](docs/User/Api/CommonDatasetApi.md#listcommondataset) | **GET** /api/v2.1/dtable/common-datasets/ | List Common Datasets
*CommonDatasetApi* | [**listSyncHistory**](docs/User/Api/CommonDatasetApi.md#listsynchistory) | **GET** /api/v2.1/dtable/common-datasets/syncs/ | List Sync History
*CommonDatasetApi* | [**publishCommonDataset**](docs/User/Api/CommonDatasetApi.md#publishcommondataset) | **POST** /api/v2.1/dtable/common-datasets/ | Publish Common Dataset
*CommonDatasetApi* | [**renameCommonDataset**](docs/User/Api/CommonDatasetApi.md#renamecommondataset) | **PUT** /api/v2.1/dtable/common-datasets/{dataset_id}/ | Rename Common Dataset
*CommonDatasetApi* | [**syncCommonDataset**](docs/User/Api/CommonDatasetApi.md#synccommondataset) | **POST** /api/v2.1/dtable/common-datasets/{dataset_id}/sync/ | Sync Common Dataset
*CommonDatasetApi* | [**updateCommonDatasetSync**](docs/User/Api/CommonDatasetApi.md#updatecommondatasetsync) | **PUT** /api/v2.1/dtable/common-datasets/{dataset_id}/sync/ | Update Common Dataset Sync
*DepartmentsApi* | [**listDeparmentMembers**](docs/User/Api/DepartmentsApi.md#listdeparmentmembers) | **GET** /api/v2.1/address-book/departments/{department_id}/members/ | List Deparment Members
*DepartmentsApi* | [**listDepartments**](docs/User/Api/DepartmentsApi.md#listdepartments) | **GET** /api/v2.1/address-book/departments/ | List Departments
*EmailAccountsApi* | [**addEmailAccount**](docs/User/Api/EmailAccountsApi.md#addemailaccount) | **POST** /api/v2.1/third-party-accounts/{base_uuid}/ | Add Email Account
*EmailAccountsApi* | [**deleteEmailAccount**](docs/User/Api/EmailAccountsApi.md#deleteemailaccount) | **DELETE** /api/v2.1/third-party-accounts/{base_uuid}/{3rd_party_account_id}/ | Delete Email Account
*EmailAccountsApi* | [**getEmailAccount**](docs/User/Api/EmailAccountsApi.md#getemailaccount) | **GET** /api/v2.1/third-party-accounts/{base_uuid}/detail/ | Get Email Account
*EmailAccountsApi* | [**getEmailSendingStatus**](docs/User/Api/EmailAccountsApi.md#getemailsendingstatus) | **GET** /api/v2.1/dtable-message-status/ | Get Email Sending Status
*EmailAccountsApi* | [**listEmailAccounts**](docs/User/Api/EmailAccountsApi.md#listemailaccounts) | **GET** /api/v2.1/third-party-accounts/{base_uuid}/ | List Email Accounts
*EmailAccountsApi* | [**updateEmailAccount**](docs/User/Api/EmailAccountsApi.md#updateemailaccount) | **PUT** /api/v2.1/third-party-accounts/{base_uuid}/{3rd_party_account_id}/ | Update Email Account
*FormsApi* | [**createForm**](docs/User/Api/FormsApi.md#createform) | **POST** /api/v2.1/forms/ | Create Form
*FormsApi* | [**deleteForm**](docs/User/Api/FormsApi.md#deleteform) | **DELETE** /api/v2.1/forms/{form_token}/ | Delete Form
*FormsApi* | [**duplicateForm**](docs/User/Api/FormsApi.md#duplicateform) | **POST** /api/v2.1/forms/{form_token}/duplicate/ | Duplicate Form
*FormsApi* | [**listForms**](docs/User/Api/FormsApi.md#listforms) | **GET** /api/v2.1/forms/ | List Forms
*FormsApi* | [**listSharedForms**](docs/User/Api/FormsApi.md#listsharedforms) | **GET** /api/v2.1/forms/shared/ | List Shared Forms
*FormsApi* | [**updateForm**](docs/User/Api/FormsApi.md#updateform) | **PUT** /api/v2.1/forms/{form_token}/ | Update Form
*FormsApi* | [**uploadFormLogo**](docs/User/Api/FormsApi.md#uploadformlogo) | **POST** /api/v2.1/forms/{form_token}/logos/ | Upload Form Logo
*GroupsWorkspacesApi* | [**addGroupMember**](docs/User/Api/GroupsWorkspacesApi.md#addgroupmember) | **POST** /api/v2.1/groups/{group_id}/members/ | Add Group Member
*GroupsWorkspacesApi* | [**copyBaseFromExternalLink**](docs/User/Api/GroupsWorkspacesApi.md#copybasefromexternallink) | **POST** /api/v2.1/dtable-external-link/dtable-copy/ | Copy Base from External Link
*GroupsWorkspacesApi* | [**copyBaseFromWorkspace**](docs/User/Api/GroupsWorkspacesApi.md#copybasefromworkspace) | **POST** /api/v2.1/dtable-copy/ | Copy Base from Workspace
*GroupsWorkspacesApi* | [**createGroup**](docs/User/Api/GroupsWorkspacesApi.md#creategroup) | **POST** /api/v2.1/groups/ | Create Group
*GroupsWorkspacesApi* | [**deleteGroup**](docs/User/Api/GroupsWorkspacesApi.md#deletegroup) | **DELETE** /api/v2.1/groups/{group_id}/ | Delete Group
*GroupsWorkspacesApi* | [**getGroup**](docs/User/Api/GroupsWorkspacesApi.md#getgroup) | **GET** /api/v2.1/groups/{group_id}/ | Get Group
*GroupsWorkspacesApi* | [**getGroupMembers**](docs/User/Api/GroupsWorkspacesApi.md#getgroupmembers) | **GET** /api/v2.1/groups/{group_id}/members/ | Get Group Members
*GroupsWorkspacesApi* | [**listGroups**](docs/User/Api/GroupsWorkspacesApi.md#listgroups) | **GET** /api/v2.1/groups/ | List Groups
*GroupsWorkspacesApi* | [**listWorkspaces**](docs/User/Api/GroupsWorkspacesApi.md#listworkspaces) | **GET** /api/v2.1/workspaces/ | List Workspaces
*GroupsWorkspacesApi* | [**removeGroupMember**](docs/User/Api/GroupsWorkspacesApi.md#removegroupmember) | **DELETE** /api/v2.1/groups/{group_id}/members/{group_member}/ | Remove Group Member
*GroupsWorkspacesApi* | [**searchGroup**](docs/User/Api/GroupsWorkspacesApi.md#searchgroup) | **GET** /api/v2.1/search-group/ | Search Group
*GroupsWorkspacesApi* | [**searchGroupMembers**](docs/User/Api/GroupsWorkspacesApi.md#searchgroupmembers) | **GET** /api/v2.1/groups/{group_id}/search-member/ | Search Group Members
*GroupsWorkspacesApi* | [**updateGroup**](docs/User/Api/GroupsWorkspacesApi.md#updategroup) | **PUT** /api/v2.1/groups/{group_id}/ | Update Group
*GroupsWorkspacesApi* | [**updateGroupRole**](docs/User/Api/GroupsWorkspacesApi.md#updategrouprole) | **PUT** /api/v2.1/groups/{group_id}/members/{group_member}/ | Update Group Role
*ImportExportApi* | [**appendToTableFromFile**](docs/User/Api/ImportExportApi.md#appendtotablefromfile) | **POST** /api/v2.1/workspace/{workspace_id}/synchronous-import/append-excel-csv-to-table/ | Append Excel CSV
*ImportExportApi* | [**exportBase**](docs/User/Api/ImportExportApi.md#exportbase) | **GET** /api/v2.1/workspace/{workspace_id}/synchronous-export/export-dtable/ | Export Base
*ImportExportApi* | [**exportBaseFromExternalLink**](docs/User/Api/ImportExportApi.md#exportbasefromexternallink) | **GET** /dtable/external-links/{external_link_token}/download-zip/ | Export Base from External Link
*ImportExportApi* | [**exportBigDataView**](docs/User/Api/ImportExportApi.md#exportbigdataview) | **GET** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/convert-big-data-view-to-excel/ | Export Big Data View to Excel
*ImportExportApi* | [**exportTable**](docs/User/Api/ImportExportApi.md#exporttable) | **GET** /api/v2.1/workspace/{workspace_id}/synchronous-export/export-table-to-excel/ | Export Table
*ImportExportApi* | [**exportView**](docs/User/Api/ImportExportApi.md#exportview) | **GET** /api/v2.1/workspace/{workspace_id}/synchronous-export/export-view-to-excel/ | Export View
*ImportExportApi* | [**importBasefromFile**](docs/User/Api/ImportExportApi.md#importbasefromfile) | **POST** /api/v2.1/workspace/{workspace_id}/synchronous-import/import-excel-csv-to-base/ | Import Base from xlsx or csv
*ImportExportApi* | [**importTableFromFile**](docs/User/Api/ImportExportApi.md#importtablefromfile) | **POST** /api/v2.1/workspace/{workspace_id}/synchronous-import/import-excel-csv-to-table/ | Import Table from xlsx or csv
*ImportExportApi* | [**updateFromFile**](docs/User/Api/ImportExportApi.md#updatefromfile) | **POST** /api/v2.1/workspace/{workspace_id}/synchronous-import/update-table-via-excel-csv/ | Update from xlsx or csv
*NotificationsApi* | [**addNotificationRule**](docs/User/Api/NotificationsApi.md#addnotificationrule) | **POST** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/notification-rules/ | Add Notification Rule
*NotificationsApi* | [**deleteNotificationRule**](docs/User/Api/NotificationsApi.md#deletenotificationrule) | **DELETE** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/notification-rules/{notification_rule_id}/ | Delete Notification Rule
*NotificationsApi* | [**listNotificationRules**](docs/User/Api/NotificationsApi.md#listnotificationrules) | **GET** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/notification-rules/ | List Notification Rules
*NotificationsApi* | [**markNotificationAsSeen**](docs/User/Api/NotificationsApi.md#marknotificationasseen) | **DELETE** /api/v2.1/notifications/ | Mark Notifications As Seen
*NotificationsApi* | [**updateNotificationRule**](docs/User/Api/NotificationsApi.md#updatenotificationrule) | **PUT** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/notification-rules/{notification_rule_id}/ | Update Notification Rule
*SharingApi* | [**createGroupShare**](docs/User/Api/SharingApi.md#creategroupshare) | **POST** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/group-shares/ | Create Group Share
*SharingApi* | [**createGroupViewShare**](docs/User/Api/SharingApi.md#creategroupviewshare) | **POST** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/group-view-shares/ | Create Group View Share
*SharingApi* | [**createUserShare**](docs/User/Api/SharingApi.md#createusershare) | **POST** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/share/ | Create User Share
*SharingApi* | [**createUserViewShare**](docs/User/Api/SharingApi.md#createuserviewshare) | **POST** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/user-view-shares/ | Create User View Share
*SharingApi* | [**deleteGroupAllViewShare**](docs/User/Api/SharingApi.md#deletegroupallviewshare) | **DELETE** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/group-view-shares/ | Delete Group View Share
*SharingApi* | [**deleteGroupShare**](docs/User/Api/SharingApi.md#deletegroupshare) | **DELETE** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/group-shares/{group_id}/ | Delete Group Share
*SharingApi* | [**deleteGroupViewShare**](docs/User/Api/SharingApi.md#deletegroupviewshare) | **DELETE** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/group-view-shares/{group_view_share_id}/ | Delete Group View Share
*SharingApi* | [**deleteUserAllViewShare**](docs/User/Api/SharingApi.md#deleteuserallviewshare) | **DELETE** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/user-view-shares/ | Delete User View Share
*SharingApi* | [**deleteUserShare**](docs/User/Api/SharingApi.md#deleteusershare) | **DELETE** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/share/ | Delete User Share
*SharingApi* | [**deleteUserViewShare**](docs/User/Api/SharingApi.md#deleteuserviewshare) | **DELETE** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/user-view-shares/{user_view_share_id}/ | Delete User View Share
*SharingApi* | [**leaveSharedView**](docs/User/Api/SharingApi.md#leavesharedview) | **DELETE** /api/v2.1/dtables/view-shares-user-shared/{user_view_share_id}/ | Leave Shared View
*SharingApi* | [**listCollaboratorsAsUser**](docs/User/Api/SharingApi.md#listcollaboratorsasuser) | **GET** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/related-users/ | List Collaborators
*SharingApi* | [**listGroupShares**](docs/User/Api/SharingApi.md#listgroupshares) | **GET** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/group-shares/ | List Group Shares
*SharingApi* | [**listGroupViewShares**](docs/User/Api/SharingApi.md#listgroupviewshares) | **GET** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/group-view-shares/ | List Group View Shares
*SharingApi* | [**listMyGroupShares**](docs/User/Api/SharingApi.md#listmygroupshares) | **GET** /api/v2.1/dtables/group-shared/ | List My Group Shares
*SharingApi* | [**listMyGroupViewShares**](docs/User/Api/SharingApi.md#listmygroupviewshares) | **GET** /api/v2.1/dtables/view-shares-group-shared/ | My Group View Shares
*SharingApi* | [**listMyShares**](docs/User/Api/SharingApi.md#listmyshares) | **GET** /api/v2.1/dtables/shared/ | List My Shares
*SharingApi* | [**listMyUserViewShares**](docs/User/Api/SharingApi.md#listmyuserviewshares) | **GET** /api/v2.1/dtables/view-shares-user-shared/ | List My User View Shares
*SharingApi* | [**listUserShares**](docs/User/Api/SharingApi.md#listusershares) | **GET** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/share/ | List User Shares
*SharingApi* | [**listUserViewShares**](docs/User/Api/SharingApi.md#listuserviewshares) | **GET** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/user-view-shares/ | List User View Shares
*SharingApi* | [**updateGroupShare**](docs/User/Api/SharingApi.md#updategroupshare) | **PUT** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/group-shares/{group_id}/ | Update Group Share
*SharingApi* | [**updateGroupViewShare**](docs/User/Api/SharingApi.md#updategroupviewshare) | **PUT** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/group-view-shares/{group_view_share_id}/ | Update Group View Share
*SharingApi* | [**updateUserShare**](docs/User/Api/SharingApi.md#updateusershare) | **PUT** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/share/ | Update User Share
*SharingApi* | [**updateUserViewShare**](docs/User/Api/SharingApi.md#updateuserviewshare) | **PUT** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/user-view-shares/{user_view_share_id}/ | Update User View Share
*SharingLinksApi* | [**createBaseExternalLink**](docs/User/Api/SharingLinksApi.md#createbaseexternallink) | **POST** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/external-links/ | Create Base External Link
*SharingLinksApi* | [**createInviteLink**](docs/User/Api/SharingLinksApi.md#createinvitelink) | **POST** /api/v2.1/dtables/invite-links/ | Create Invite Link
*SharingLinksApi* | [**createViewExternalLink**](docs/User/Api/SharingLinksApi.md#createviewexternallink) | **POST** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/view-external-links/ | Create View External Link
*SharingLinksApi* | [**deleteExternalLink**](docs/User/Api/SharingLinksApi.md#deleteexternallink) | **DELETE** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/external-links/{external_link_token}/ | Delete External Link
*SharingLinksApi* | [**deleteInviteLink**](docs/User/Api/SharingLinksApi.md#deleteinvitelink) | **DELETE** /api/v2.1/dtables/invite-links/{invite_link_token}/ | Delete Invite Link
*SharingLinksApi* | [**deleteViewExternalLink**](docs/User/Api/SharingLinksApi.md#deleteviewexternallink) | **DELETE** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/view-external-links/{view_external_link_token}/ | Delete View External Link
*SharingLinksApi* | [**listBaseExternalLinks**](docs/User/Api/SharingLinksApi.md#listbaseexternallinks) | **GET** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/external-links/ | List Base External Links
*SharingLinksApi* | [**listViewExternalLinks**](docs/User/Api/SharingLinksApi.md#listviewexternallinks) | **GET** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/view-external-links/ | List View External Links
*SnapshotsApi* | [**listSnapshots**](docs/User/Api/SnapshotsApi.md#listsnapshots) | **GET** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/snapshots/ | List Snapshots
*SnapshotsApi* | [**restoreSnapshot**](docs/User/Api/SnapshotsApi.md#restoresnapshot) | **POST** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/snapshots/{commit_id}/restore/ | Restore Snapshot
*SystemNotificationsApi* | [**listSystemNotifications**](docs/User/Api/SystemNotificationsApi.md#listsystemnotifications) | **GET** /api/v2.1/sys-user-notifications/unseen/ | List System Notifications
*SystemNotificationsApi* | [**markSystemNotificationsAsSeen**](docs/User/Api/SystemNotificationsApi.md#marksystemnotificationsasseen) | **PUT** /api/v2.1/sys-user-notifications/{sys_notification_id}/seen/ | Mark System Notification As Seen
*UserApi* | [**addUserAvatar**](docs/User/Api/UserApi.md#adduseravatar) | **POST** /api/v2.1/user-avatar/ | Upload/Update User Avatar
*UserApi* | [**getAccountInfo**](docs/User/Api/UserApi.md#getaccountinfo) | **GET** /api2/account/info/ | Get Account Info
*UserApi* | [**getPublicUserInfo**](docs/User/Api/UserApi.md#getpublicuserinfo) | **GET** /api/v2.1/user-common-info/{user_id}/ | Get Public User Info
*UserApi* | [**listPublicUserInfos**](docs/User/Api/UserApi.md#listpublicuserinfos) | **POST** /api/v2.1/user-list/ | List Public User Infos
*UserApi* | [**searchUser**](docs/User/Api/UserApi.md#searchuser) | **GET** /api2/search-user/ | Search User
*UserApi* | [**updateEmailAddress**](docs/User/Api/UserApi.md#updateemailaddress) | **PUT** /api/v2.1/user/contact-email/ | Update Email Address
*WebhooksApi* | [**createWebhook**](docs/User/Api/WebhooksApi.md#createwebhook) | **POST** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/webhooks/ | Create Webhook
*WebhooksApi* | [**deleteWebhook**](docs/User/Api/WebhooksApi.md#deletewebhook) | **DELETE** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/webhooks/{webhook_id}/ | Delete Webhook
*WebhooksApi* | [**listWebhooks**](docs/User/Api/WebhooksApi.md#listwebhooks) | **GET** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/webhooks/ | List Webhooks
*WebhooksApi* | [**updateWebhook**](docs/User/Api/WebhooksApi.md#updatewebhook) | **PUT** /api/v2.1/workspace/{workspace_id}/dtable/{base_name}/webhooks/{webhook_id}/ | Update Webhook


## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `5.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`