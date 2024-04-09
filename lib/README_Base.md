# OpenAPIClient-php

## API Endpoints - Base

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ActivitiesLogsApi* | [**getBaseActivityLog**](docs/Base/Api/ActivitiesLogsApi.md#getbaseactivitylog) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/operations/ | Get Base Activity Log
*ActivitiesLogsApi* | [**listDeleteOperations**](docs/Base/Api/ActivitiesLogsApi.md#listdeleteoperations) | **GET** /api/v2.1/dtables/{base_uuid}/delete-operation-logs/ | List Delete Operations
*ActivitiesLogsApi* | [**listDeletedRows**](docs/Base/Api/ActivitiesLogsApi.md#listdeletedrows) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/deleted-rows/ | List Deleted Rows
*ActivitiesLogsApi* | [**listRowActivities**](docs/Base/Api/ActivitiesLogsApi.md#listrowactivities) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/activities/ | List Row Activities
*BaseInfoApi* | [**getBaseInfo**](docs/Base/Api/BaseInfoApi.md#getbaseinfo) | **GET** /dtable-server/dtables/{base_uuid} | Get Base Info
*BaseInfoApi* | [**getBigDataStatus**](docs/Base/Api/BaseInfoApi.md#getbigdatastatus) | **GET** /dtable-db/api/v1/base-info/{base_uuid}/ | Get Big Data Status
*BaseInfoApi* | [**getMetadata**](docs/Base/Api/BaseInfoApi.md#getmetadata) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/metadata/ | Get Metadata
*BaseInfoApi* | [**listCollaborators**](docs/Base/Api/BaseInfoApi.md#listcollaborators) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/related-users/ | List Collaborators
*BigDataApi* | [**createBigDataRowsLink**](docs/Base/Api/BigDataApi.md#createbigdatarowslink) | **POST** /dtable-db/api/v1/base/{base_uuid}/links/ | Create Row Links in Big Data
*BigDataApi* | [**deleteBigDataRowLinks**](docs/Base/Api/BigDataApi.md#deletebigdatarowlinks) | **DELETE** /dtable-db/api/v1/base/{base_uuid}/links/ | Delete Row Links in Big Data
*BigDataApi* | [**deleteBigDataRows**](docs/Base/Api/BigDataApi.md#deletebigdatarows) | **DELETE** /dtable-db/api/v1/delete-rows/{base_uuid}/ | Delete Rows in Big Data
*BigDataApi* | [**insertBigDataRows**](docs/Base/Api/BigDataApi.md#insertbigdatarows) | **POST** /dtable-db/api/v1/insert-rows/{base_uuid}/ | Insert Rows into Big Data
*BigDataApi* | [**moveRowsToBigData**](docs/Base/Api/BigDataApi.md#moverowstobigdata) | **POST** /dtable-server/api/v1/dtables/{base_uuid}/archive-view/ | Move Rows to Big Data
*BigDataApi* | [**updateBigDataRows**](docs/Base/Api/BigDataApi.md#updatebigdatarows) | **PUT** /dtable-db/api/v1/update-rows/{base_uuid}/ | Update Rows in Big Data
*ColumnsApi* | [**addSelectOption**](docs/Base/Api/ColumnsApi.md#addselectoption) | **POST** /dtable-server/api/v1/dtables/{base_uuid}/column-options/ | Add Single/Multiple Select Options
*ColumnsApi* | [**appendColumns**](docs/Base/Api/ColumnsApi.md#appendcolumns) | **POST** /dtable-server/api/v1/dtables/{base_uuid}/batch-append-columns/ | Append Columns
*ColumnsApi* | [**deleteColumn**](docs/Base/Api/ColumnsApi.md#deletecolumn) | **DELETE** /dtable-server/api/v1/dtables/{base_uuid}/columns/ | Delete Column
*ColumnsApi* | [**deleteSelectOption**](docs/Base/Api/ColumnsApi.md#deleteselectoption) | **DELETE** /dtable-server/api/v1/dtables/{base_uuid}/column-options/ | Delete Single/Multiple Select Options
*ColumnsApi* | [**insertColumn**](docs/Base/Api/ColumnsApi.md#insertcolumn) | **POST** /dtable-server/api/v1/dtables/{base_uuid}/columns/ | Insert Column
*ColumnsApi* | [**listColumns**](docs/Base/Api/ColumnsApi.md#listcolumns) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/columns/ | List Columns
*ColumnsApi* | [**updateColumn**](docs/Base/Api/ColumnsApi.md#updatecolumn) | **PUT** /dtable-server/api/v1/dtables/{base_uuid}/columns/ | Update Column
*ColumnsApi* | [**updateColumnCascade**](docs/Base/Api/ColumnsApi.md#updatecolumncascade) | **POST** /dtable-server/api/v1/dtables/{base_uuid}/column-cascade-settings/ | Update Column Cascade
*ColumnsApi* | [**updateSelectOption**](docs/Base/Api/ColumnsApi.md#updateselectoption) | **PUT** /dtable-server/api/v1/dtables/{base_uuid}/column-options/ | Update Single/Multiple Select Options
*LinksApi* | [**createRowLink**](docs/Base/Api/LinksApi.md#createrowlink) | **POST** /dtable-server/api/v1/dtables/{base_uuid}/links/ | Create Row Link
*LinksApi* | [**createRowLinks**](docs/Base/Api/LinksApi.md#createrowlinks) | **PUT** /dtable-server/api/v1/dtables/{base_uuid}/links/ | Create Row Links
*LinksApi* | [**deleteRowLink**](docs/Base/Api/LinksApi.md#deleterowlink) | **DELETE** /dtable-server/api/v1/dtables/{base_uuid}/links/ | Delete Row Link
*LinksApi* | [**listRowLinks**](docs/Base/Api/LinksApi.md#listrowlinks) | **POST** /dtable-db/api/v1/linked-records/{base_uuid} | List Row Links
*LinksApi* | [**updateRowLinks**](docs/Base/Api/LinksApi.md#updaterowlinks) | **PUT** /dtable-server/api/v1/dtables/{base_uuid}/batch-update-links/ | Update Row Links (Batch)
*NotificationsApi* | [**deleteBaseNotifications**](docs/Base/Api/NotificationsApi.md#deletebasenotifications) | **DELETE** /dtable-server/api/v1/dtables/{base_uuid}/notifications/ | Delete Base Notifications
*NotificationsApi* | [**listBaseNotifications**](docs/Base/Api/NotificationsApi.md#listbasenotifications) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/notifications/ | List Base Notifications
*NotificationsApi* | [**markBaseNotificationAsSeen**](docs/Base/Api/NotificationsApi.md#markbasenotificationasseen) | **PUT** /dtable-server/api/v1/dtables/{base_uuid}/notifications/{notification_id}/ | Mark Notification Read/Unread
*NotificationsApi* | [**markBaseNotificationsAsSeen**](docs/Base/Api/NotificationsApi.md#markbasenotificationsasseen) | **PUT** /dtable-server/api/v1/dtables/{base_uuid}/notifications/ | Mark Base Notifications as seen
*RowCommentsApi* | [**deleteComment**](docs/Base/Api/RowCommentsApi.md#deletecomment) | **DELETE** /dtable-server/api/v1/dtables/{base_uuid}/comments/{comment_id}/ | Delete Comment
*RowCommentsApi* | [**getComment**](docs/Base/Api/RowCommentsApi.md#getcomment) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/comments/{comment_id}/ | Get Comment
*RowCommentsApi* | [**getRowCommentsCount**](docs/Base/Api/RowCommentsApi.md#getrowcommentscount) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/comments-count/ | Get Row Comments Count
*RowCommentsApi* | [**listCommentsWithinDays**](docs/Base/Api/RowCommentsApi.md#listcommentswithindays) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/comments-within-days/ | List Comments within Days
*RowCommentsApi* | [**listRowComments**](docs/Base/Api/RowCommentsApi.md#listrowcomments) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/comments/ | List Row Comments
*RowsApi* | [**addRow**](docs/Base/Api/RowsApi.md#addrow) | **POST** /dtable-server/api/v1/dtables/{base_uuid}/rows/ | Add Row
*RowsApi* | [**appendRows**](docs/Base/Api/RowsApi.md#appendrows) | **POST** /dtable-server/api/v1/dtables/{base_uuid}/batch-append-rows/ | Append Rows
*RowsApi* | [**deleteRow**](docs/Base/Api/RowsApi.md#deleterow) | **DELETE** /dtable-server/api/v1/dtables/{base_uuid}/rows/ | Delete Row
*RowsApi* | [**deleteRows**](docs/Base/Api/RowsApi.md#deleterows) | **DELETE** /dtable-server/api/v1/dtables/{base_uuid}/batch-delete-rows/ | Delete Rows
*RowsApi* | [**getRow**](docs/Base/Api/RowsApi.md#getrow) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/rows/{row_id}/ | Get Row
*RowsApi* | [**listFilteredRows**](docs/Base/Api/RowsApi.md#listfilteredrows) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/filtered-rows/ | List Filtered Rows
*RowsApi* | [**listRows**](docs/Base/Api/RowsApi.md#listrows) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/rows/ | List Rows
*RowsApi* | [**lockRows**](docs/Base/Api/RowsApi.md#lockrows) | **PUT** /dtable-server/api/v1/dtables/{base_uuid}/lock-rows/ | Lock Rows
*RowsApi* | [**querySQL**](docs/Base/Api/RowsApi.md#querysql) | **POST** /dtable-db/api/v1/query/{base_uuid}/ | List Rows (with SQL)
*RowsApi* | [**unlockRows**](docs/Base/Api/RowsApi.md#unlockrows) | **PUT** /dtable-server/api/v1/dtables/{base_uuid}/unlock-rows/ | Unlock Rows
*RowsApi* | [**updateRow**](docs/Base/Api/RowsApi.md#updaterow) | **PUT** /dtable-server/api/v1/dtables/{base_uuid}/rows/ | Update Row
*RowsApi* | [**updateRows**](docs/Base/Api/RowsApi.md#updaterows) | **PUT** /dtable-server/api/v1/dtables/{base_uuid}/batch-update-rows/ | Update Rows
*SnapshotsApi* | [**createSnapshot**](docs/Base/Api/SnapshotsApi.md#createsnapshot) | **POST** /dtable-server/api/v1/dtables/{base_uuid}/snapshot/ | Create Snapshot
*TablesApi* | [**createTable**](docs/Base/Api/TablesApi.md#createtable) | **POST** /dtable-server/api/v1/dtables/{base_uuid}/tables/ | Create Table
*TablesApi* | [**deleteTable**](docs/Base/Api/TablesApi.md#deletetable) | **DELETE** /dtable-server/api/v1/dtables/{base_uuid}/tables/ | Delete Table
*TablesApi* | [**duplicateTable**](docs/Base/Api/TablesApi.md#duplicatetable) | **POST** /dtable-server/api/v1/dtables/{base_uuid}/tables/duplicate-table/ | Duplicate Table
*TablesApi* | [**renameTable**](docs/Base/Api/TablesApi.md#renametable) | **PUT** /dtable-server/api/v1/dtables/{base_uuid}/tables/ | Rename Table
*ViewsApi* | [**createView**](docs/Base/Api/ViewsApi.md#createview) | **POST** /dtable-server/api/v1/dtables/{base_uuid}/views/ | Create View
*ViewsApi* | [**deleteView**](docs/Base/Api/ViewsApi.md#deleteview) | **DELETE** /dtable-server/api/v1/dtables/{base_uuid}/views/{view_name}/ | Delete View
*ViewsApi* | [**getView**](docs/Base/Api/ViewsApi.md#getview) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/views/{view_name}/ | Get View
*ViewsApi* | [**listViews**](docs/Base/Api/ViewsApi.md#listviews) | **GET** /dtable-server/api/v1/dtables/{base_uuid}/views/ | List Views
*ViewsApi* | [**updateView**](docs/Base/Api/ViewsApi.md#updateview) | **PUT** /dtable-server/api/v1/dtables/{base_uuid}/views/{view_name}/ | Update View


## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `4.4`
    - Generator version: `7.5.0-SNAPSHOT`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`