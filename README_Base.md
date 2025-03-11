# OpenAPIClient-php

## API Endpoints - Base

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ActivitiesLogsApi* | [**getBaseActivityLog**](docs/Base/Api/ActivitiesLogsApi.md#getbaseactivitylog) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/operations/ | Get Base Activity Log
*ActivitiesLogsApi* | [**listDeleteOperations**](docs/Base/Api/ActivitiesLogsApi.md#listdeleteoperations) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/deleted-rows/ | List Delete Operations
*ActivitiesLogsApi* | [**listRowActivities**](docs/Base/Api/ActivitiesLogsApi.md#listrowactivities) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/activities/ | List Row Activities
*BaseInfoApi* | [**getBaseInfo**](docs/Base/Api/BaseInfoApi.md#getbaseinfo) | **GET** /api-gateway/api/v2/dtables/{base_uuid} | Get Base Info
*BaseInfoApi* | [**getMetadata**](docs/Base/Api/BaseInfoApi.md#getmetadata) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/metadata/ | Get Metadata
*BaseInfoApi* | [**listCollaborators**](docs/Base/Api/BaseInfoApi.md#listcollaborators) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/related-users/ | List Collaborators
*BigDataApi* | [**addBigDataRows**](docs/Base/Api/BigDataApi.md#addbigdatarows) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/add-archived-rows/ | Add Rows into Big Data Backend
*BigDataApi* | [**moveRowsToBigData**](docs/Base/Api/BigDataApi.md#moverowstobigdata) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/archive-view/ | Move Rows to Big Data Backend
*BigDataApi* | [**moveRowsToNormalBackend**](docs/Base/Api/BigDataApi.md#moverowstonormalbackend) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/unarchive/ | Move Rows to Normal Backend
*ColumnsApi* | [**addSelectOption**](docs/Base/Api/ColumnsApi.md#addselectoption) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/column-options/ | Add Single/Multiple Select Options
*ColumnsApi* | [**appendColumns**](docs/Base/Api/ColumnsApi.md#appendcolumns) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/batch-append-columns/ | Append Columns
*ColumnsApi* | [**deleteColumn**](docs/Base/Api/ColumnsApi.md#deletecolumn) | **DELETE** /api-gateway/api/v2/dtables/{base_uuid}/columns/ | Delete Column
*ColumnsApi* | [**deleteSelectOption**](docs/Base/Api/ColumnsApi.md#deleteselectoption) | **DELETE** /api-gateway/api/v2/dtables/{base_uuid}/column-options/ | Delete Single/Multiple Select Options
*ColumnsApi* | [**insertColumn**](docs/Base/Api/ColumnsApi.md#insertcolumn) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/columns/ | Insert Column
*ColumnsApi* | [**listColumns**](docs/Base/Api/ColumnsApi.md#listcolumns) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/columns/ | List Columns
*ColumnsApi* | [**updateColumn**](docs/Base/Api/ColumnsApi.md#updatecolumn) | **PUT** /api-gateway/api/v2/dtables/{base_uuid}/columns/ | Update Column
*ColumnsApi* | [**updateColumnCascade**](docs/Base/Api/ColumnsApi.md#updatecolumncascade) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/column-cascade-settings/ | Update Column Cascade Settings
*ColumnsApi* | [**updateSelectOption**](docs/Base/Api/ColumnsApi.md#updateselectoption) | **PUT** /api-gateway/api/v2/dtables/{base_uuid}/column-options/ | Update Single/Multiple Select Options
*LinksApi* | [**autoLinkTask**](docs/Base/Api/LinksApi.md#autolinktask) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/auto-link-task/ | Auto Link task
*LinksApi* | [**autoLinks**](docs/Base/Api/LinksApi.md#autolinks) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/auto-links/ | Auto Links
*LinksApi* | [**createRowLink**](docs/Base/Api/LinksApi.md#createrowlink) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/links/ | Create Row Link(s)
*LinksApi* | [**deleteRowLink**](docs/Base/Api/LinksApi.md#deleterowlink) | **DELETE** /api-gateway/api/v2/dtables/{base_uuid}/links/ | Delete Row Link(s)
*LinksApi* | [**listRowLinks**](docs/Base/Api/LinksApi.md#listrowlinks) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/query-links/ | List Row Links
*LinksApi* | [**updateRowLink**](docs/Base/Api/LinksApi.md#updaterowlink) | **PUT** /api-gateway/api/v2/dtables/{base_uuid}/links/ | Update Row Link(s)
*NotificationsApi* | [**deleteBaseNotifications**](docs/Base/Api/NotificationsApi.md#deletebasenotifications) | **DELETE** /api-gateway/api/v2/dtables/{base_uuid}/notifications/ | Delete Base Notifications
*NotificationsApi* | [**listBaseNotifications**](docs/Base/Api/NotificationsApi.md#listbasenotifications) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/notifications/ | List Base Notifications
*NotificationsApi* | [**markBaseNotificationAsSeen**](docs/Base/Api/NotificationsApi.md#markbasenotificationasseen) | **PUT** /api-gateway/api/v2/dtables/{base_uuid}/notifications/{notification_id}/ | Mark Notification Read/Unread
*NotificationsApi* | [**markBaseNotificationsAsSeen**](docs/Base/Api/NotificationsApi.md#markbasenotificationsasseen) | **PUT** /api-gateway/api/v2/dtables/{base_uuid}/notifications/ | Mark Base Notifications as seen
*NotificationsApi* | [**sendToastNotification**](docs/Base/Api/NotificationsApi.md#sendtoastnotification) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/ui-toasts/ | Send toast notification
*RowCommentsApi* | [**deleteComment**](docs/Base/Api/RowCommentsApi.md#deletecomment) | **DELETE** /api-gateway/api/v2/dtables/{base_uuid}/comments/{comment_id}/ | Delete Comment
*RowCommentsApi* | [**getComment**](docs/Base/Api/RowCommentsApi.md#getcomment) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/comments/{comment_id}/ | Get Comment
*RowCommentsApi* | [**getRowCommentsCount**](docs/Base/Api/RowCommentsApi.md#getrowcommentscount) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/comments-count/ | Get Row Comments Count
*RowCommentsApi* | [**listCommentsWithinDays**](docs/Base/Api/RowCommentsApi.md#listcommentswithindays) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/comments-within-days/ | List Comments within Days
*RowCommentsApi* | [**listRowComments**](docs/Base/Api/RowCommentsApi.md#listrowcomments) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/comments/ | List Row Comments
*RowsApi* | [**appendRows**](docs/Base/Api/RowsApi.md#appendrows) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/rows/ | Append Row(s)
*RowsApi* | [**deleteRow**](docs/Base/Api/RowsApi.md#deleterow) | **DELETE** /api-gateway/api/v2/dtables/{base_uuid}/rows/ | Delete Row(s)
*RowsApi* | [**getRow**](docs/Base/Api/RowsApi.md#getrow) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/rows/{row_id}/ | Get Row
*RowsApi* | [**listRows**](docs/Base/Api/RowsApi.md#listrows) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/rows/ | List Rows
*RowsApi* | [**lockRows**](docs/Base/Api/RowsApi.md#lockrows) | **PUT** /api-gateway/api/v2/dtables/{base_uuid}/lock-rows/ | Lock Rows
*RowsApi* | [**querySQL**](docs/Base/Api/RowsApi.md#querysql) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/sql | Query SeaTable with SQL
*RowsApi* | [**unlockRows**](docs/Base/Api/RowsApi.md#unlockrows) | **PUT** /api-gateway/api/v2/dtables/{base_uuid}/unlock-rows/ | Unlock Rows
*RowsApi* | [**updateRow**](docs/Base/Api/RowsApi.md#updaterow) | **PUT** /api-gateway/api/v2/dtables/{base_uuid}/rows/ | Update Row(s)
*SnapshotsApi* | [**createSnapshot**](docs/Base/Api/SnapshotsApi.md#createsnapshot) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/snapshot/ | Create Snapshot
*TablesApi* | [**createTable**](docs/Base/Api/TablesApi.md#createtable) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/tables/ | Create Table
*TablesApi* | [**deleteTable**](docs/Base/Api/TablesApi.md#deletetable) | **DELETE** /api-gateway/api/v2/dtables/{base_uuid}/tables/ | Delete Table
*TablesApi* | [**duplicateTable**](docs/Base/Api/TablesApi.md#duplicatetable) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/tables/duplicate-table/ | Duplicate Table
*TablesApi* | [**renameTable**](docs/Base/Api/TablesApi.md#renametable) | **PUT** /api-gateway/api/v2/dtables/{base_uuid}/tables/ | Rename Table
*ViewsApi* | [**createView**](docs/Base/Api/ViewsApi.md#createview) | **POST** /api-gateway/api/v2/dtables/{base_uuid}/views/ | Create View
*ViewsApi* | [**deleteView**](docs/Base/Api/ViewsApi.md#deleteview) | **DELETE** /api-gateway/api/v2/dtables/{base_uuid}/views/{view_name}/ | Delete View
*ViewsApi* | [**getView**](docs/Base/Api/ViewsApi.md#getview) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/views/{view_name}/ | Get View
*ViewsApi* | [**listViews**](docs/Base/Api/ViewsApi.md#listviews) | **GET** /api-gateway/api/v2/dtables/{base_uuid}/views/ | List Views
*ViewsApi* | [**updateView**](docs/Base/Api/ViewsApi.md#updateview) | **PUT** /api-gateway/api/v2/dtables/{base_uuid}/views/{view_name}/ | Update View


## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `5.2`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`