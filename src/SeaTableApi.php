<?php

namespace SeaTable\SeaTableApi;

use SeaTable\SeaTableApi\Compat\Deprecation\Php;
use SeaTable\SeaTableApi\Internal\ApiOptions;
use SeaTable\SeaTableApi\Internal\RestCurlClientEx;

/**
 * SeaTable API - PHP class wrapper
 *
 * @author <cdb@seatable.io> (thanks for the inspiration by <ben@netcap.fr>)
 * @copyright 2020, 2021 SeaTable GmbH
 * @license APACHE-2.0
 *
 * SeaTable - Next-generation online spreadsheet <https://seatable.io>
 *
 * SeaTable API <https://api.seatable.io/> (formerly: <https://docs.seatable.io/published/seatable-api/home.md>)
 */
class SeaTableApi
{
    private $seatable_url;                          # url of the SeaTable server

    private $dtable_uuid;

    /**
     * @var RestCurlClientEx
     */
    private $restCurlClientEx;

    /**
     * Instantiate SeaTable class
     *
     * @param array{url: string, user: string, password: string, port?: int} $options
     * @throws Exception
     */
    public function __construct(array $options = [])
    {
        /*
         * Input validation
         */
        $apiOptions = ApiOptions::createFromArray($options);
        $this->seatable_url = $apiOptions->getUrl();

        $this->restCurlClientEx = new RestCurlClientEx($apiOptions->getHttpOptions());

        /*
         * Return seatable token
         */
        $this->getAuthToken($apiOptions->getUser(), $apiOptions->getPassword());
    }

    /**
     * Obtain SeaTable Auth Token
     *
     * @param string $username
     * @param string $password
     * @return void
     */
    private function getAuthToken(string $username, string $password): void
    {
        $data = $this->restCurlClientEx->post($this->seatable_url . '/api2/auth-token/', [
            'username' => $username,
            'password' => $password,
        ]);
        $this->restCurlClientEx->seatable_token = (string) $data->token;
    }

    /**
     * Ping Server (with authentication)
     *
     * @group Authentication / Ping Server
     * @link https://api.seatable.io/#5a2261c2-4e87-44fa-8b28-0145759de970
     *
     * @return string "pong" if auth token is correct
     */
    public function ping(): string
    {
        $request = $this->seatable_url . '/api2/auth/ping/';

        return $this->restCurlClientEx->get($request);
    }

    /**
     * Get Account Info
     *
     * @group User / Account
     * @link https://api.seatable.io/#66ce3ca0-edc5-486b-8877-91157bb71d7d
     */
    public function getAccountInfo(): object
    {
        $request = "$this->seatable_url/api2/account/info/";
        return $this->restCurlClientEx->get($request);
    }

    /**
     * Get Account Info
     *
     * @group User / Account
     * @link https://api.seatable.io/#66ce3ca0-edc5-486b-8877-91157bb71d7d
     *
     * @deprecated since 0.1.18, use `SeaTableApi::getAccountInfo()`; {@see SeaTableApi::getAccountInfo}
     *
     * @return object the account info
     */
    public function checkAccountInfo(): object
    {
        Php::triggerMethodDeprecation('0.1.18', 'use SeaTableApi::getAccountInfo() instead');
        return $this->getAccountInfo();
    }

    /**
     * List All Users
     *
     * @group System Admin / Users
     * @link https://api.seatable.io/#883d8faf-1f2a-4033-8904-0171fece890c
     *
     * @param int $page Select Page the users shown from (default 1)
     * @param int $perPage Number of users that should be shown (default = 25)
     * @return object
     */
    public function sysAdminListUsers(int $page = 1, int $perPage = 25): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/users/?per_page=$perPage&page=$page";
        return $this->restCurlClientEx->get($request);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminListUsers()`; {@see SeaTableApi::sysAdminListUsers}
     */
    public function listUsers(int $page = 1, int $perPage = 25): object
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminListUsers() instead");
        return $this->sysAdminListUsers($page, $perPage);
    }

    /**
     * {@unfit}
     *
     * @group System Admin / Users
     * @link https://api.seatable.io/#883d8faf-1f2a-4033-8904-0171fece890c
     *
     * @deprecated since 0.1.15, use `SeaTableApi::sysAdminListUsers(1, 1)->total_count`; {@see SeaTableApi::sysAdminListUsers}
     *
     * @return int
     */
    public function getTotalUsers(): int
    {
        Php::triggerMethodDeprecation('0.1.15', "use SeaTableApi::sysAdminListUsers(1, 1)->total_count instead");
        return $this->sysAdminListUsers(1, 1)->total_count;
    }

    /**
     * Add New User
     *
     * @group System Admin / Users
     * @link https://api.seatable.io/#922eb788-ebad-47b1-af34-e1aec536182e
     *
     * @param string $email
     * @param string $name
     * @param string $password
     * @param string $role
     * @return object with user account details
     */
    public function sysAdminAddUser(string $email, string $name, string $password, string $role = 'default'): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/users/";
        $form = [
            'email' => $email,
            'name' => $name,
            'password' => $password,
            'role' => $role,
        ];
        return $this->restCurlClientEx->post($request, $form);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminAddUser()`; {@see SeaTableApi::sysAdminAddUser}
     */
    public function addUser(string $email, string $name, string $password, string $role = 'default'): object
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminAddUser() instead");
        return $this->sysAdminAddUser($email, $name, $password, $role);
    }

    /**
     * Search a User
     *
     * @group System Admin / Users
     * @link https://api.seatable.io/#95fcb3f1-5496-4113-a078-22972c19e583
     *
     * @param string $query
     * @return object
     */
    public function sysAdminSearchUser(string $query): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/search-user/?query=" . urlencode($query);
        return $this->restCurlClientEx->get($request);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminSearchUser()`; {@see SeaTableApi::sysAdminSearchUser}
     */
    public function searchUser(string $query): object
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminSearchUser() instead");
        return $this->sysAdminSearchUser(urldecode($query));
    }


    /**
     * Update User
     *
     * @group System Admin / Users
     * @link https://api.seatable.io/#8fcb4411-4007-495a-b3f3-c3014c4f7ace
     *
     * @param string $email
     * @param array $changes role, ...
     * @return object
     */
    public function sysAdminUpdateUser(string $email, array $changes = []): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/users/" . rawurlencode($email) . '/';

        return $this->restCurlClientEx->put($request, $changes);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminUpdateUser()`; {@see SeaTableApi::sysAdminUpdateUser}
     */
    public function updateUser(string $email, array $changes = []): object
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminUpdateUser() instead");
        return $this->sysAdminUpdateUser($email, $changes);
    }

    /**
     * Activate User {@unfit}
     *
     * @deprecated since 0.1.13, use `SeaTableApi::sysAdminUpdateUser($email, ['is_active' => 'true'])`; {@see SeaTableApi::sysAdminUpdateUser}
     *
     * @param string $email
     * @return object
     */
    public function activateUser(string $email): object
    {
        Php::triggerMethodDeprecation('0.1.13', "use SeaTableApi::sysAdminUpdateUser(\$email, ['is_active' => 'true']) instead");
        return $this->sysAdminUpdateUser($email, ['is_active' => 'true']);
    }

    /**
     * Deactivate User {@unfit}
     *
     * @deprecated since 0.1.13, use `SeaTableApi::sysAdminUpdateUser($email, ['is_active' => 'false'])`; {@see SeaTableApi::sysAdminUpdateUser}
     *
     * @param string $email
     * @return object
     */
    public function deactivateUser(string $email): object
    {
        Php::triggerMethodDeprecation('0.1.13', "use SeaTableApi::sysAdminUpdateUser(\$email, ['is_active' => 'false']) instead");
        return $this->sysAdminUpdateUser($email, ['is_active' => 'false']);
    }

    /**
     * Delete User
     *
     * @group System Admin / Users
     * @link https://api.seatable.io/#17bdf15e-fbb8-4fa9-b8ef-43841fc6c40d
     *
     * @param string $email
     * @return array|object|string|null
     */
    public function sysAdminDeleteUser(string $email): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/users/" . rawurlencode($email) . '/';
        return $this->restCurlClientEx->delete($request);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminDeleteUser()`; {@see SeaTableApi::sysAdminDeleteUser}
     */
    public function deleteUser(string $email): object
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminDeleteUser() instead");
        return $this->sysAdminDeleteUser($email);
    }

    /**
     * List Workspaces
     *
     * @group User / Workspaces
     * @link https://api.seatable.io/#bb823388-ccfb-4dc2-bb01-5eb81acb6683
     *
     * @return object
     */
    public function listWorkspaces(): object
    {
        $request = "$this->seatable_url/api/v2.1/workspaces/";
        return $this->restCurlClientEx->get($request);
    }

    /**
     * List Workspaces {@unfit}
     *
     * @group User / Workspaces
     * @link https://api.seatable.io/#bb823388-ccfb-4dc2-bb01-5eb81acb6683
     *
     * @return array|object[]
     * @deprecated since 0.1.15, use `SeaTableApi::listWorkspaces()->workspace_list` {@see SeaTableApi::listWorkspaces}
     */
    public function listAllWorkspaces(): array
    {
        Php::triggerMethodDeprecation('0.1.15', "use SeaTableApi::listWorkspaces()->workspace_list instead");
        return $this->listWorkspaces()->workspace_list;
    }

    /**
     * List Workspaces {@unfit}
     *
     * @group User / Workspaces
     * @link https://api.seatable.io/#bb823388-ccfb-4dc2-bb01-5eb81acb6683
     *
     * @return array|object[]
     * @deprecated since 0.1.15, use `SeaTableApi::listWorkspaces()->starred_dtable_list` {@see SeaTableApi::listWorkspaces}
     */
    public function listStarredWorkspaces(): array
    {
        Php::triggerMethodDeprecation('0.1.15', "use SeaTableApi::listWorkspaces()->starred_dtable_list instead");
        return $this->listWorkspaces()->starred_dtable_list;
    }

    /**
     * Update a Base
     *
     * Update a base's name, icon and icon color.
     *
     * @group User / Bases / Base Management
     * @link https://api.seatable.io/#55d6c818-3247-4b89-b169-9de2872a023f
     *
     * @param int $workspaceId
     * @param string $baseName
     * @param array $changes
     * @return object
     */
    public function updateBase(int $workspaceId, string $baseName, array $changes = []): object
    {
        $changes['name'] = $baseName;
        $request = "$this->seatable_url/api/v2.1/workspace/$workspaceId/dtable/";
        return $this->restCurlClientEx->put($request, $changes);
    }

    /**
     * @deprecated since 0.1.18, use `SeaTableApi::updateBase()`; {@see SeaTableApi::updateBase}
     */
    public function updateDTable(int $workspaceId, string $dtableName, array $changes = []): object
    {
        Php::triggerMethodDeprecation('0.1.18', 'use SeaTableApi::updateBase() instead');
        return $this->updateBase($workspaceId, $dtableName, $changes);
    }

    /**
     * Copy a Base from an External Link
     *
     * @group User / Bases / Base Management
     * @link https://api.seatable.io/#21b89497-80a0-4b35-9543-5d584e92fa80
     *
     * @param string $link
     * @param int $destinationWorkspaceId
     * @return object
     */
    public function copyBaseExternalLink(string $link, int $destinationWorkspaceId): object
    {
        $request = "$this->seatable_url/api/v2.1/dtable-external-link/dtable-copy/";
        $f = [
            'link' => $link,
            'dst_workspace_id' => $destinationWorkspaceId,
        ];
        return $this->restCurlClientEx->post($request, $f);
    }

    /**
     * @deprecated since 0.1.20, use `SeaTableApi::copyBaseExternalLink()`; {@see SeaTableApi::copyBaseExternalLink}
     */
    public function copyDTableExternalLink(string $link, int $destinationWorkspaceId): object
    {
        Php::triggerMethodDeprecation('0.1.20', 'use SeaTableApi::copyBaseExternalLink() instead');
        return $this->copyBaseExternalLink($link, $destinationWorkspaceId);
    }

    /**
     * get dtable token {@unfit}
     *
     * either via api-token or authentication on workspace + base
     *
     * @param array $input
     * @return object
     * @deprecated since 0.1.11, use `SeaTableApi::getBaseAppAccessToken()` or `SeaTableApi::getBaseAccessToken()`; {@see SeaTableApi::getBaseAppAccessToken} or {@see SeaTableApi::getBaseAccessToken}
     */
    public function getDTableToken(array $input): object
    {
        $isAppAccessToken = array_key_exists("api_token", $input);
        $isBaseAccessToken = array_key_exists("table_name", $input) && array_key_exists("workspace_id", $input);

        $instead = [];
        $isBaseAccessToken || $instead[] = 'getBaseAppAccessToken';
        $isAppAccessToken || $instead[] = 'getBaseAccessToken';

        Php::triggerMethodDeprecation(
            '0.1.11',
            sprintf(
                'use SeaTableApi::%s() instead%s',
                implode('() or ::', $instead),
                count($instead) === 1 ? ' in this case' : ''
            )
        );
        unset($instead);

        if ($isAppAccessToken) {
            return $this->getBaseAppAccessToken($input['api_token']);
        }

        if ($isBaseAccessToken) {
            return $this->getBaseAccessToken($input['workspace_id'], $input['table_name']);
        }

        throw new Exception("getDtableToken parameters are wrong: use either api_token or workspace_id + table_name");
    }

    /**
     * Get Base Access Token via API Token
     *
     * @link https://api.seatable.io/#3b782fd2-6091-4871-acc7-2725bfc7e067
     *
     * @param string $apiToken API Token
     * @return object
     *
     * @deprecated since 0.1.16, use `SeaTableApi::getBaseAppAccessToken()`; {@see SeaTableApi::getBaseAppAccessToken}
     */
    public function getDTableAccessToken(string $apiToken): object
    {
        Php::triggerMethodDeprecation('0.1.16', 'use SeaTableApi::getBaseAppAccessToken() instead');
        return $this->getBaseAppAccessToken($apiToken);
    }

    /**
     * Get Base Access Token via API Token
     *
     * @group Authentication / Base Access Token
     * @link https://api.seatable.io/#3b782fd2-6091-4871-acc7-2725bfc7e067
     *
     * @param string $apiToken
     * @return object
     */
    public function getBaseAppAccessToken(string $apiToken): object
    {
        $request = $this->seatable_url . '/api/v2.1/dtable/app-access-token/';
        $appAccessToken = $this->restCurlClientEx->get($request, [], $apiToken);
        $this->restCurlClientEx->access_token = $appAccessToken->access_token;
        $this->dtable_uuid = $appAccessToken->dtable_uuid;
        return $appAccessToken;
    }

    /**
     * Get Base Access Token via Auth Token
     *
     * @group Authentication / Base Access Token
     * @link https://api.seatable.io/#7b251436-a4f1-4793-bd03-678caa32c29d
     *
     * @param int $workspaceId Workspace ID
     * @param string $name Base Name
     * @return object
     *
     * @deprecated since 0.1.16, use `SeaTableApi::getBaseAccessToken()`; {@see SeaTableApi::getBaseAccessToken}
     */
    public function getTableAccessToken(int $workspaceId, string $name): object
    {
        Php::triggerMethodDeprecation('0.1.16', 'use SeaTableApi::getBaseAccessToken() instead');
        return $this->getBaseAccessToken($workspaceId, $name);
    }

    /**
     * Get Base Access Token via Auth Token
     *
     * @group Authentication / Base Access Token
     * @link https://api.seatable.io/#7b251436-a4f1-4793-bd03-678caa32c29d
     *
     * @param int $workspaceId
     * @param string $baseName
     * @return object
     */
    public function getBaseAccessToken(int $workspaceId, string $baseName): object
    {
        $request = "$this->seatable_url/api/v2.1/workspace/$workspaceId/dtable/" . rawurlencode($baseName) . '/access-token/';
        $accessToken = $this->restCurlClientEx->get($request);
        $this->restCurlClientEx->access_token = $accessToken->access_token;
        $this->dtable_uuid = $accessToken->dtable_uuid;
        return $accessToken;
    }

    /**
     * List Rows
     *
     * @group Base Operations / Rows
     * @link https://api.seatable.io/#c7caa77d-6214-4ca1-bb91-5c1d3d19c52d
     *
     * @param string $tableName
     * @param string|null $viewName
     * @param bool $convertLinkId
     * @param string|null $orderBy
     * @param bool $direction false: ascending, true: descending
     * @param int $start
     * @param int $limit
     * @return object
     */
    public function listRows(string $tableName, string $viewName = null, bool $convertLinkId = false, string $orderBy = null, bool $direction = false, int $start = 0, int $limit = 1000): object
    {
        $request = "$this->seatable_url/dtable-server/api/v1/dtables/$this->dtable_uuid/rows/";
        $request .= '?' . http_build_query([
            'table_name' => $tableName,
            'view_name' => $viewName,
            'convert_link_id' => $convertLinkId ? 'true' : 'false',
            'order_by' => $orderBy,
            'direction' => $direction ? 'desc' : 'asc',
            'start' => $start,
            'limit' => $limit,
        ]);

        return $this->restCurlClientEx->get($request);
    }

    /**
     * List Rows {@unfit}
     *
     * @group Base Operations / Rows
     * @link https://api.seatable.io/#c7caa77d-6214-4ca1-bb91-5c1d3d19c52d
     *
     * @param string $tableName
     * @param string|null $viewName (optional)
     * @return array
     *
     * @deprecated since 0.1.17, use `SeaTableApi::listRows()->rows`; {@see SeaTableApi::listRows}
     */
    public function listRowsByView(string $tableName, string $viewName = null): array
    {
        Php::triggerMethodDeprecation('0.1.17', 'use SeaTableApi::listRows()->rows instead');
        return $this->listRows($tableName, $viewName)->rows;
    }

    /**
     * Append Row
     *
     * @group Base Operations / Rows
     * @link https://api.seatable.io/#28fa1ae4-3b6d-43c7-99ea-79a458cee213
     *
     * @param string $tableName
     * @param array $row
     * @return object
     */
    public function appendRow(string $tableName, array $row): object
    {
        $request = "$this->seatable_url/dtable-server/api/v1/dtables/$this->dtable_uuid/rows/";
        $definition = [
            'table_name' => $tableName,
            'row' => $row,
        ];
        $buffer = json_encode($definition);
        if (!is_string($buffer)) {
            throw new \UnexpectedValueException('Definition failed to encode (JSON)');
        }
        return $this->restCurlClientEx->post($request, $buffer);
    }

    /**
     * Update Row
     *
     * @group Base Operations / Rows
     * @link https://api.seatable.io/#8397f141-4df6-438e-858a-1ccc112cda75
     *
     * @param string $tableName
     * @param array $row
     * @param string $rowId
     * @return object
     */
    public function updateRow(string $tableName, array $row, string $rowId): object
    {
        $request = "$this->seatable_url/dtable-server/api/v1/dtables/$this->dtable_uuid/rows/";
        $definition = [
            'table_name' => $tableName,
            'row' => $row,
            'row_id' => $rowId,
        ];
        $buffer = json_encode($definition);
        if (!is_string($buffer)) {
            throw new \UnexpectedValueException('Definition failed to encode (JSON)');
        }
        return $this->restCurlClientEx->put($request, $buffer);
    }

    /**
     * Get Base Metadata
     *
     * @group Base Operations / Bases Infos
     * @link https://api.seatable.io/#0ba333a2-7450-4b03-8efb-6c49d6b47a0e
     *
     * @return object
     */
    public function getBaseMetadata(): object
    {
        $request = $this->seatable_url . '/dtable-server/api/v1/dtables/' . $this->dtable_uuid . '/metadata/';

        return $this->restCurlClientEx->get($request);
    }

    /**
     * Get Metadata from active Base {@unfit}
     *
     * @deprecated since 0.1.14, use `SeaTableApi::getBaseMetadata()->metadata`; {@see SeaTableApi::getBaseMetadata}
     * @return object
     */
    public function getDTableMetadata(): object
    {
        Php::triggerMethodDeprecation('0.1.14', 'use SeaTableApi::getBaseMetadata()->metadata instead');

        return $this->getBaseMetadata()->metadata;
    }

    /**
     * @deprecated since 0.1.14, use `array_column(SeaTableApi::getBaseMetadata()->metadata->tables, null, 'name')[$table_name] ?? null`; {@see SeaTableApi::getBaseMetadata}
     * @param string $tableName
     * @return object|null
     */
    public function getColumnsFromTable(string $tableName): ?object
    {
        Php::triggerMethodDeprecation('0.1.14', "use array_column(SeaTableApi::getBaseMetadata()->metadata->tables, null, 'name')[\$tableName] ?? null instead");

        return array_column($this->getBaseMetadata()->metadata->tables, null, 'name')[$tableName] ?? null;
    }

    /**
     * List of Daily Active Users
     *
     * @group System Admin / Statistics
     * @link https://api.seatable.io/#a3590cbf-1ec4-4148-8aa4-308d10a8437e
     *
     * @param string $date
     * @param int $page
     * @param int $perPage
     * @return object
     */
    public function sysAdminListDailyActiveUsers(string $date = '2020-08-12 00:00:00', int $page = 1, int $perPage = 25): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/daily-active-users/?date=" . urlencode($date) . "&per_page=$perPage&page=$page";
        return $this->restCurlClientEx->get($request);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminListDailyActiveUsers()`; {@see SeaTableApi::sysAdminListDailyActiveUsers}
     */
    public function listDailyActiveUsers($date = '2020-08-12+00:00:00', $per_page = 5000, $page = 1)
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminListDailyActiveUsers() instead");
        return $this->sysAdminListDailyActiveUsers(urldecode($date), $page, $per_page);
    }

    /**
     * List Teams (Organizations)
     *
     * @group System Admin / Teams (organizations)
     * @link https://api.seatable.io/#3eec0a21-4322-46b8-936d-d003ef540852
     *
     * @param int $page
     * @param int $perPage
     * @return object
     */
    public function sysAdminListTeams(int $page = 1, int $perPage = 25): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/organizations/?per_page=$perPage&page=$page";
        return $this->restCurlClientEx->get($request);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminListTeams()`; {@see SeaTableApi::sysAdminListTeams}
     */
    public function listOrganizations($per_page = 25, $page = 1)
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminListTeams() instead");
        return $this->sysAdminListTeams($page, $per_page);
    }

    /**
     * Add Team (Organization)
     *
     * @group System Admin / Teams (organizations)
     * @link https://api.seatable.io/#4dc845bd-9eb2-4ab5-a57f-8d1bdebd62bf
     *
     * @param string $name of team (organization)
     * @param string $adminEmail
     * @param string $adminName
     * @param string $password
     * @param int $maxUser
     * @return object
     */
    public function sysAdminAddTeam(string $name, string $adminEmail, string $adminName, string $password, int $maxUser): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/organizations/";
        $org = [
            'org_name' => $name,
            'admin_email' => $adminEmail,
            'admin_name' => $adminName,
            'password' => $password,
            'max_user_number' => $maxUser,
        ];
        return $this->restCurlClientEx->post($request, $org);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminAddTeam()`; {@see SeaTableApi::sysAdminAddTeam}
     */
    public function addOrganization($org_name, $admin_email, $admin_name, $password, $max_user_number)
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminAddTeam() instead");
        return $this->sysAdminAddTeam($org_name, $admin_email, $admin_name, $password, $max_user_number);
    }

    /**
     * Delete Team (Organization)
     *
     * @group System Admin / Teams (organizations)
     * @link https://api.seatable.io/#424afa58-ad74-444d-8007-8bfeee79ff87
     *
     * @param int $id
     * @return object
     */
    public function sysAdminDeleteTeam(int $id): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/organizations/$id/";
        return $this->restCurlClientEx->delete($request);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminDeleteTeam()`; {@see SeaTableApi::sysAdminDeleteTeam}
     */
    public function deleteOrganization($org_id)
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminDeleteTeam() instead");
        return $this->sysAdminDeleteTeam($org_id);
    }

    /**
     * Update Team (Organization)
     *
     * @group System Admin / Teams (organizations)
     * @link https://api.seatable.io/#e9f4b4cd-e234-42c2-9159-b05ff33c23ca
     *
     * @param int $id
     * @param array $changes possible changes are: role, max_user_number, org_name, row_limit, asset_quota
     * @return object
     */
    public function sysAdminUpdateTeam(int $id, array $changes = []): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/organizations/$id/";
        return $this->restCurlClientEx->put($request, $changes);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminUpdateTeam()`; {@see SeaTableApi::sysAdminUpdateTeam}
     */
    public function updateOrganization($org_id, $org_changes = [])
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminUpdateTeam() instead");
        return $this->sysAdminUpdateTeam($org_id, $org_changes);
    }

    /**
     * List Team Members
     *
     * @group System Admin / Teams (organizations)
     * @link https://api.seatable.io/#f5dad123-02a7-4b50-a9a0-464cebd7c922
     *
     * @param int $id
     * @param int $page
     * @param int $perPage
     * @param bool $isStaff defaults to false which includes all users (incl. team admins)
     * @return object
     */
    public function sysAdminListTeamUsers(int $id, int $page = 1, int $perPage = 25, bool $isStaff = false): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/organizations/$id/users/?per_page=$perPage&page=$page&is_staff=" . ($isStaff ? 'true' : 'false');

        return $this->restCurlClientEx->get($request);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminListTeamUsers()`; {@see SeaTableApi::sysAdminListTeamUsers}
     */
    public function listOrgUsers($org_id, $is_staff = false, $per_page = 25, $page = 1)
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminListTeamUsers() instead");
        return $this->sysAdminListTeamUsers($org_id, $page, $per_page, $is_staff);
    }

    /**
     * Add a Team User
     *
     * @group System Admin / Teams (organizations)
     * @link https://api.seatable.io/#ee0150d3-d5a4-43e4-9d5f-0cb5f207f168
     *
     * @param int $id
     * @param string $email
     * @param string $pass
     * @param string|null $name
     * @return object
     */
    public function sysAdminAddTeamUser(int $id, string $email, string $pass, string $name = null): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/organizations/$id/users/";
        null === $name && $name = (string)strtok($email, '@');
        $user = [
            'email' => $email,
            'name' => $name,
            'password' => $pass,
        ];
        return $this->restCurlClientEx->post($request, $user);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminAddTeamUser()`; {@see SeaTableApi::sysAdminAddTeamUser}
     */
    public function addOrgUser($org_id, $email, $pass, $name = "")
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminAddTeamUser() instead");
        return $this->sysAdminAddTeamUser($org_id, $email, $pass, $name);
    }

    /**
     * Delete a Team User
     *
     * @group System Admin / Teams (organizations)
     * @link https://api.seatable.io/#e7bd43e5-ef48-4dd1-85b1-be5118ca4dc4
     *
     * @param int $id Team
     * @param string $email User
     * @return object
     */
    public function sysAdminDeleteTeamUser(int $id, string $email): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/organizations/$id/users/" . rawurlencode($email) . '/';
        return $this->restCurlClientEx->delete($request);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminDeleteTeamUser()`; {@see SeaTableApi::sysAdminDeleteTeamUser}
     */
    public function deleteOrgUser($org_id, $email)
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminDeleteTeamUser() instead");
        return $this->sysAdminDeleteTeamUser($org_id, $email);
    }

    /**
     * List Team Groups
     *
     * @group System Admin / Teams (organizations)
     * @link https://api.seatable.io/#42e907af-577c-49c0-8cbf-28d03c65c01c
     *
     * @param int $id
     * @return object
     */
    public function sysAdminListTeamGroups(int $id): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/organizations/$id/groups/";
        return $this->restCurlClientEx->get($request);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminListTeamGroups()`; {@see SeaTableApi::sysAdminListTeamGroups}
     */
    public function listOrgGroups($org_id)
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminListTeamGroups() instead");
        return $this->sysAdminListTeamGroups($org_id);
    }

    /**
     * List Team Bases
     *
     * @group System Admin / Teams (organizations)
     * @link https://api.seatable.io/#b1fe997d-f5e5-48fc-ab1b-0b5b4e9df6ab
     *
     * @param int $id
     * @param int $page
     * @param int $perPage
     * @return object
     */
    public function sysAdminListTeamBases(int $id, int $page = 1, int $perPage = 25): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/organizations/$id/dtables/?per_page=$perPage&page=$page";
        return $this->restCurlClientEx->get($request);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminListTeamBases()`; {@see SeaTableApi::sysAdminListTeamBases}
     */
    public function listOrgBases($org_id, $per_page = 25, $page = 1)
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminListTeamBases() instead");
        return $this->sysAdminListTeamBases($org_id, $page, $per_page);
    }

    /**
     * Get User's Common Info
     *
     * @group User / Account
     * @link https://api.seatable.io/#c78b6b44-b238-46a6-a9c5-c70aec1faa71
     *
     * @param string $email
     * @return object
     */
    public function getCommonInfo(string $email): object
    {
        $request = "$this->seatable_url/api/v2.1/user-common-info/" . rawurlencode($email) . '/';
        return $this->restCurlClientEx->get($request);
    }

    /**
     * Get a Team
     *
     * @group System Admin / Teams (organizations)
     * @link https://api.seatable.io/#bf22f375-4eba-4fe4-ba09-fe8082dc5fd6
     *
     * @param int $id
     * @return object
     */
    public function sysAdminGetTeam(int $id): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/organizations/$id/";
        return $this->restCurlClientEx->get($request);
    }

    /**
     * Get Team Information / Get a Team {@unfit}
     *
     * @group System Admin / Teams (organizations)
     * @link https://api.seatable.io/#bf22f375-4eba-4fe4-ba09-fe8082dc5fd6
     *
     * @param int $orgId
     * @return object
     * @deprecated since 0.1.15, use `SeaTableApi::sysAdminGetTeam()` {@see SeaTableApi::sysAdminGetTeam}
     */
    public function getOrgInfo(int $orgId): object
    {
        Php::triggerMethodDeprecation('0.1.15', "use SeaTableApi::sysAdminGetTeam() instead");
        return $this->sysAdminGetTeam($orgId);
    }

    /**
     * Add System Notification to User
     *
     * @group System Admin / System Notifications
     * @link https://api.seatable.io/#65927c78-d524-456e-aaa8-674019b5bd98
     *
     * @param string $msg
     * @param string $username
     * @return object
     */
    public function sysAdminAddSystemNotificationToUser(string $msg, string $username): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/sys-user-notifications/";
        $body = [
            'msg' => $msg,
            'username' => $username,
        ];
        return $this->restCurlClientEx->post($request, $body);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::sysAdminAddSystemNotificationToUser()`; {@see SeaTableApi::sysAdminAddSystemNotificationToUser}
     */
    public function addSystemNotificationToUser(string $msg, string $username): object
    {
        Php::triggerMethodDeprecation('0.1.21', "use SeaTableApi::sysAdminAddSystemNotificationToUser() instead");
        return $this->sysAdminAddSystemNotificationToUser($msg, $username);
    }

    /**
     * @deprecated since 0.1.15, use `SeaTableApi::sysAdminAddSystemNotificationToUser()`; {@see SeaTableApi::sysAdminAddSystemNotificationToUser}
     */
    public function addASystemNotificationToAUser(string $msg, string $username): object
    {
        Php::triggerMethodDeprecation('0.1.15', "use SeaTableApi::sysAdminAddSystemNotificationToUser() instead");
        return $this->sysAdminAddSystemNotificationToUser($msg, $username);
    }

    /**
     * List System Notifications
     *
     * @group System Admin / System Notifications
     * @link https://api.seatable.io/#dc65d982-2c19-4be7-85e2-3c1a4f94a8a3
     *
     * @param int $page
     * @param int $perPage
     * @return object
     */
    public function listAllSystemNotifications(int $page = 1, int $perPage = 25): object
    {
        $request = "$this->seatable_url/api/v2.1/admin/sys-user-notifications/?per_page=$perPage&page=$page";
        return $this->restCurlClientEx->get($request);
    }

    /**
     * Import Base from *.dtable or *.csv File
     *
     * @group User / Bases / Base Management
     * @link https://api.seatable.io/#3a888a1e-833f-407d-8586-0a5e1cdfa851
     */
    public function importBaseFromFile(int $workspaceId, string $path): object
    {
        $request = "$this->seatable_url/api/v2.1/workspace/$workspaceId/import-dtable/";

        $form = ['dtable' => $this->restCurlClientEx->curlFile($path)];

        return $this->restCurlClientEx->post($request, $form);
    }

    /**
     * Import Base from *.dtable or *.csv File
     *
     * @group User / Bases
     * @link https://api.seatable.io/#3a888a1e-833f-407d-8586-0a5e1cdfa851
     *
     * @deprecated since 0.1.18, use `SeaTableApi::importBaseFromFile()`; {@see SeaTableApi::importBaseFromFile}
     */
    public function importDTable(int $workspaceId, string $path): object
    {
        Php::triggerMethodDeprecation('0.1.18', 'use SeaTableApi::importBaseFromFile() instead');
        return $this->importBaseFromFile($workspaceId, $path);
    }

    /**
     * Upload/Update User Avatar
     *
     * @group User / Account
     * @link https://api.seatable.io/#137dc28b-0f0d-4f18-8e33-993946811ec6
     *
     * @param string $path to image file
     * @return object
     */
    public function updateAvatar(string $path): object
    {
        $request = $this->seatable_url . '/api/v2.1/user-avatar/';

        $curlFile = $this->restCurlClientEx->curlFile($path);

        return $this->restCurlClientEx->post($request, ['avatar' => $curlFile]);
    }

    /**
     * List Groups (in your Team)
     *
     * @group Team Admin / Groups
     * @link https://api.seatable.io/#2f842f81-4723-4a6d-b96c-38f31cbbc546
     */
    public function listGroups(int $orgId, int $page = 1, int $perPage = 2): object
    {
        $request = "$this->seatable_url/api/v2.1/org/$orgId/admin/groups/?page=$page&per_page=$perPage";

        return $this->restCurlClientEx->get($request);
    }

    /**
     * Add Group
     *
     * @group Team Admin / Groups
     * @link https://api.seatable.io/#4fd4ab0b-1ea8-413a-bb50-bd8a982f1f54
     *
     * @param int $id
     * @param string $groupName
     * @param string $groupOwner
     * @return object
     */
    public function teamAdminAddGroup(int $id, string $groupName, string $groupOwner): object
    {
        $request =  "$this->seatable_url/api/v2.1/org/$id/admin/groups/";

        return $this->restCurlClientEx->post($request, [
            'group_name' => $groupName,
            'group_owner' => $groupOwner,
        ]);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::teamAdminAddGroup()`; {@see SeaTableApi::teamAdminAddGroup}
     */
    public function addGroup(int $orgId, string $groupName, string $groupOwner): object
    {
        Php::triggerMethodDeprecation('0.1.21', 'use SeaTableApi::teamAdminAddGroup() instead');
        return $this->teamAdminAddGroup($orgId, $groupName, $groupOwner);
    }

    /**
     * Batch Add Members to Group
     *
     * @group Team Admin / Group Members
     * @link https://api.seatable.io/#277fa732-b785-4933-859b-1f36487ade96
     *
     * @param int $id
     * @param int $groupId
     * @param string|string[] $email
     * @param string ...$emails
     * @return object
     */
    public function teamAdminAddGroupMember(int $id, int $groupId, string $email, string ...$emails): object
    {
        $request = "$this->seatable_url/api/v2.1/org/$id/admin/groups/$groupId/members/";

        array_unshift($emails, $email);
        $buffer = array_reduce($emails, static function ($carry, $item) {
            if (is_string($item) && strlen($item) > 3) {
                '' === $carry || $carry .= '&';
                $carry .= 'email=' . urlencode($item);
            }
            return $carry;
        }, '');
        $httpOptions = [CURLOPT_HTTPHEADER => ['Authorization: Token ' . $this->restCurlClientEx->seatable_token, 'Content-Type: application/x-www-form-urlencoded']];

        return $this->restCurlClientEx->post($request, $buffer, $httpOptions);
    }

    /**
     * @deprecated since 0.1.21, use `SeaTableApi::teamAdminAddGroupMember()`; {@see SeaTableApi::teamAdminAddGroupMember}
     */
    public function addGroupMember(int $orgId, int $groupId, string $email, string ...$emails): object
    {
        Php::triggerMethodDeprecation('0.1.21', 'use SeaTableApi::teamAdminAddGroupMember() instead');
        return $this->teamAdminAddGroupMember($orgId, $groupId, $email, ...$emails);
    }

    /**
     * Change a Group Members' Role
     *
     * @group Team Admin / Group Members
     * @link https://api.seatable.io/#6de52f15-e574-4b92-b5f9-255a5efa4ef8
     */
    public function teamAdminUpdateGroupMember(int $orgId, int $groupId, string $email, bool $isAdmin): object
    {
        $request = "$this->seatable_url/api/v2.1/org/$orgId/admin/groups/$groupId/members/" . rawurlencode($email) . '/';

        return $this->restCurlClientEx->put($request, [
            'is_admin' => json_encode($isAdmin),
        ]);
    }

    /**
     * Remove A Member from A Group
     *
     * @group Team Admin / Group Members
     * @link https://api.seatable.io/#95df40eb-4670-453d-a6a3-030c4a8549d5
     */
    public function deleteGroupMember(int $orgId, int $groupId, string $email): object
    {
        $request = "$this->seatable_url/api/v2.1/org/$orgId/admin/groups/$groupId/members/" . rawurlencode($email) . '/';

        return $this->restCurlClientEx->delete($request);
    }

    /**
     * Create A Base API Token
     *
     * @group Authentication / Base API Token
     * @ref [dTable api] dtable-web-api.js:438 addTableAPIToken
     * @link https://api.seatable.io/#1866e49a-1eb4-4865-9fef-fc28b111c787
     *
     * @param int $workspaceId
     * @param string $baseName
     * @param string $appName
     * @param string $permission
     * @return object
     */
    public function createBaseApiToken(int $workspaceId, string $baseName, string $appName, string $permission = "r"): object
    {
        $request = $this->seatable_url . '/api/v2.1/workspace/' . $workspaceId . '/dtable/' . rawurlencode($baseName) . '/api-tokens/';
        return $this->restCurlClientEx->post($request, [
            'app_name' => $appName,
            'permission' => $permission,
        ]);
    }

    /**
     * Add A Plugin
     *
     * @group System Admin / Plugins
     * @link https://api.seatable.io/#e4fb06bd-17af-4dc4-9098-221c293cf9e0
     *
     * @param string $path
     * @return object
     */
    public function addPlugin(string $path): object
    {
        $request = $this->seatable_url . '/api/v2.1/admin/dtable-system-plugins/';

        $curlFile = new \CURLFile(realpath($path));

        return $this->restCurlClientEx->post($request, [
            'plugin' => $curlFile,
        ]);
    }

    /**
     * Delete All Notifications
     *
     * @group User / Notification
     * @link https://api.seatable.io/#e7803745-e90d-49c7-b41e-790a317b9860
     *
     * @return object
     */
    public function deleteAllNotifications(): object
    {
        $request = $this->seatable_url . '/api/v2.1/notifications/';

        return $this->restCurlClientEx->delete($request);
    }
}
