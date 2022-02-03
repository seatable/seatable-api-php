<?php

namespace SeaTable\SeaTableApi;

use SeaTable\SeaTableApi\Compat\Deprecation\Php;
use SeaTable\SeaTableApi\Internal\ApiOptions;
use SeaTable\SeaTableApi\Internal\RestCurlClientEx;
use stdClass;

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
    /**
     * @var stdClass
     */
    private $apiStateEx;

    private $seatable_url;                          # url of the SeaTable server

    private $dtable_uuid;

    /**
     * cUrl response code from SeaTable server
     *
     * internal public access via {@see SeaTableApi::__get()} {@see SeaTableApi::__set()} {@see SeaTableApi::__isset()}
     *
     * @deprecated since 0.1.4, no replacement
     */
    private $seatable_code;

    /**
     * SeaTable response message
     *
     * internal public access via {@see SeaTableApi::__get()} {@see SeaTableApi::__set()} {@see SeaTableApi::__isset()}
     *
     * @deprecated since 0.1.4, no replacement
     * @var string
     */
    private $seatable_status;

    /**
     * Convert response to array instead of object
     *
     * Defaults to false
     *
     * @deprecated since 0.1.4, no replacement
     * @see SeaTableApi::__set()
     * @var bool
     */
    private $response_object_to_array = false;

    /**
     * Curl info
     *
     * internal public access via {@see SeaTableApi::__get()} {@see SeaTableApi::__set()} {@see SeaTableApi::__isset()}
     *
     * @deprecated since 0.1.4, no replacement
     * @property $response_info;
     */
    private $response_info;

    /**
     * @var RestCurlClientEx
     */
    private $restCurlClientEx;

    /**
     * Instantiate SeaTable class
     *
     * @param array{url: string, user: string, password: string, port?: int} $option
     * @throws Exception
     */
    public function __construct($option = [])
    {
        /*
         * Input validation
         */
        $options = ApiOptions::createFromArray($option);
        $this->seatable_url = $options->getUrl();

        /*
         * extracted api state (deprecation and removal)
         */
        $this->apiStateEx = new stdClass();
        $this->apiStateEx->response_object_to_array = false;
        $this->apiStateEx->seatable_code = null;
        $this->apiStateEx->seatable_status = null;

        $this->restCurlClientEx = new RestCurlClientEx($this->apiStateEx, $options->getHttpOptions());

        /*
         * Return seatable token
         */
        $this->getAuthToken($options->getUser(), $options->getPassword());
    }

    public function __set($name, $value)
    {
        if ($name === 'response_object_to_array') {
            $value = (bool) $value;
            if ($value === true) {
                $location = Php::callSite();
                Php::triggerDeprecation(
                    '0.1.4',
                    'SeaTableApi->response_object_to_array = true is deprecated and will be removed in a future version. In %s on line %s',
                    $location['file'],
                    $location['line']
                );
            }
            $this->apiStateEx->$name = $value;
        }

        if (in_array($name, ['seatable_code', 'seatable_status', 'response_info'])) {
            $location = Php::callSite();
            Php::triggerDeprecation(
                '0.1.4',
                'Setting of SeaTableApi->%s has no effect on the API, is deprecated and the property for reading will be removed in a future version. In %s on line %s',
                $name,
                $location['file'],
                $location['line']
            );
        }
    }

    public function __get($name)
    {
        $location = Php::callSite();
        if ($name === 'response_object_to_array') {
            Php::triggerDeprecation(
                '0.1.4',
                'Reading of SeaTableApi->response_object_to_array is deprecated and will be removed in a future version. In %s on line %s',
                $location['file'],
                $location['line']
            );
            return $this->apiStateEx->$name;
        }

        if (in_array($name, ['seatable_code', 'seatable_status', 'response_info'])) {
            Php::triggerDeprecation(
                '0.1.4',
                'Reading of SeaTableApi->%s is deprecated and will be removed in a future version. In %s on line %s',
                $name,
                $location['file'],
                $location['line']
            );
            return $this->apiStateEx->$name;
        }

        trigger_error(
            sprintf(
                'Undefined property: %s::$%s in %s on line %d',
                __CLASS__,
                $name,
                $location['file'],
                $location['line']
            ),
            PHP_VERSION_ID < 80000 ? E_USER_NOTICE : E_USER_WARNING
        );
    }

    public function __isset($name)
    {
        if ($name === 'response_object_to_array') {
            return true;
        }

        if (in_array($name, ['seatable_code', 'seatable_status', 'response_info'])) {
            return true;
        }
    }

    /**
     * @deprecated since 0.1.4, no replacement
     */
    public function get($url, $http_options = [], $api_token = "")
    {
        Php::triggerMethodDeprecation('0.1.4', 'there is no replacement');
        return $this->restCurlClientEx->get($url, $http_options, $api_token);
    }

    /**
     * @deprecated since 0.1.4, no replacement
     */
    public function post($url, $form_fields = [], $http_options = [])
    {
        Php::triggerMethodDeprecation('0.1.4', 'there is no replacement');
        return $this->restCurlClientEx->post($url, $form_fields, $http_options);
    }

    /**
     * @deprecated since 0.1.4, no replacement
     */
    public function put($url, $data = '', $http_options = [])
    {
        Php::triggerMethodDeprecation('0.1.4', 'there is no replacement');
        return $this->restCurlClientEx->put($url, $data, $http_options);
    }

    /**
     * @deprecated since 0.1.4, no replacement
     */
    public function delete($url, $http_options = [])
    {
        Php::triggerMethodDeprecation('0.1.4', 'there is no replacement');
        return $this->restCurlClientEx->delete($url, $http_options);
    }

    /**
     * Obtain SeaTable Auth Token
     *
     * @return void
     */
    private function getAuthToken(string $username, string $password)
    {
        $data = $this->restCurlClientEx->post($this->seatable_url . '/api2/auth-token/', [
            'username' => $username,
            'password' => $password,
        ]);
        $this->restCurlClientEx->seatable_token = (string) $data->token;
    }

    /**
     * (all) Ping SeaTable server
     *
     * @return string "pong" if auth token is correct
     */
    public function ping()
    {
        $request = $this->seatable_url . '/api2/auth/ping/';
        return $this->restCurlClientEx->get($request);
    }

    /**
     * (all) Return SeaTable account information
     *
     * @return object|array the account info
     */
    public function checkAccountInfo()
    {
        $request = $this->seatable_url . '/api2/account/info/';
        return $this->restCurlClientEx->get($request);
    }

    /**
     * (admin only) Return all users on the SeaTable Server
     * https://docs.seatable.io/published/seatable-api/dtable-web-v2.1-admin/users.md
     *
     * @param int $per_page Number of users that should be shown (default = 25)
     * @param int $page Select Page the users shown from (default 1)
     * @return object|array
     */
    public function listUsers($per_page = 25, $page = 1)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/users/?per_page=' . $per_page . '&page=' . $page;
        return $this->restCurlClientEx->get($request);
    }

    /**
     * (admin only)
     * @return int
     */
    public function getTotalUsers()
    {
        $request = $this->seatable_url . '/api/v2.1/admin/users/?per_page=1&page=1';
        return $this->restCurlClientEx->get($request)->total_count;
    }

    /**
     * (admin only) Add new User to the SeaTable System
     * https://docs.seatable.io/published/seatable-api/dtable-web-v2.1-admin/users.md
     *
     * @param string $email
     * @param string $name
     * @param string $password
     * @param string $role
     * @return object|array with user account details
     */
    public function addUser($email, $name, $password, $role = 'default')
    {
        $request = $this->seatable_url . '/api/v2.1/admin/users/';
        $form = [
            'email' => $email,
            'name' => $name,
            'password' => $password,
            'role' => $role,
        ];
        return $this->restCurlClientEx->post($request, $form);
    }

    /**
     * @return object|array "user_list"
     */
    public function searchUser($query)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/search-user/?query=' . $query;
        return $this->restCurlClientEx->get($request);
    }

    public function updateUser($email, $changes = [])
    {
        $request = $this->seatable_url . '/api/v2.1/admin/users/' . $email . '/';
        // erlaubt ist: role, ...
        return $this->restCurlClientEx->put($request, $changes);
    }

    public function activateUser($email)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/users/' . $email . '/';
        $form = [
            'is_active' => "true",
        ];
        return $this->restCurlClientEx->put($request, $form);
    }

    public function deactivateUser($email)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/users/' . $email . '/';
        $form = [
            'is_active' => "false",
        ];
        return $this->restCurlClientEx->put($request, $form);
    }

    // (admin only)
    public function deleteUser($email)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/users/' . $email . '/';
        $d = [];
        return $this->restCurlClientEx->delete($request, $d);
    }

    /**
     * List all workspaces
     * @return array
     */
    public function listAllWorkspaces()
    {
        $request = $this->seatable_url . '/api/v2.1/workspaces/';
        return $this->restCurlClientEx->get($request)->workspace_list;
    }

    public function listStarredWorkspaces()
    {
        $request = $this->seatable_url . '/api/v2.1/workspaces/';
        return $this->restCurlClientEx->get($request)->starred_dtable_list;
    }

    public function updateDTable($workspace_id, $dtable_name, $changes = [])
    {
        $changes['name'] = $dtable_name;
        $request = $this->seatable_url . '/api/v2.1/workspace/' . $workspace_id . '/dtable/';
        return $this->restCurlClientEx->put($request, $changes);
    }

    public function copyDTableExternalLink($link, $dst_workspace_id)
    {
        $request = $this->seatable_url . '/api/v2.1/dtable-external-link/dtable-copy/';
        $f = [
            'link' => $link,
            'dst_workspace_id' => $dst_workspace_id,
        ];
        return $this->restCurlClientEx->post($request, $f);
    }

    /**
     * get dtable token
     *
     * either via api-token or authentication on workspace + base
     *
     * @param array $input
     * @return object
     * @deprecated use {@see SeaTableApi::getDTableAccessToken()} or {@see SeaTableApi::getTableAccessToken()}
     */
    public function getDTableToken($input)
    {
        $isAppAccessToken = array_key_exists("api_token", $input);
        $isTableAccessToken = array_key_exists("table_name", $input) && array_key_exists("workspace_id", $input);

        $instead = [];
        $isTableAccessToken || $instead[] = 'getDTableAccessToken';
        $isAppAccessToken || $instead[] = 'getTableAccessToken';

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
            return $this->getDTableAccessToken($input['api_token']);
        }

        if ($isTableAccessToken) {
            return $this->getTableAccessToken($input['workspace_id'], $input['table_name']);
        }

        throw new Exception("getDtableToken parameters are wrong: use either api_token or workspace_id + table_name");
    }

    /**
     * Get Base Access Token via API Token
     *
     * @param string $apiToken API Token
     * @return object
     */
    public function getDTableAccessToken(string $apiToken)
    {
        $request = $this->seatable_url . '/api/v2.1/dtable/app-access-token/';
        $o = $this->restCurlClientEx->get($request, [], $apiToken);
        $this->restCurlClientEx->access_token = $o->access_token;
        $this->dtable_uuid = $o->dtable_uuid;
        return $o;
    }

    /**
     * Get Base Access Token via Auth Token
     *
     * @param int $workspaceId Workspace ID
     * @param string $name Table Name
     * @return object
     */
    public function getTableAccessToken(int $workspaceId, string $name)
    {
        $request = $this->seatable_url . '/api/v2.1/workspace/' . $workspaceId . '/dtable/' . rawurlencode($name) . '/access-token/';
        $o = $this->restCurlClientEx->get($request);
        $this->restCurlClientEx->access_token = $o->access_token;
        $this->dtable_uuid = $o->dtable_uuid;
        return $o;
    }

    public function listRowsByView($table_name, $view_name = "")
    {
        $request = $this->seatable_url . '/dtable-server/api/v1/dtables/' . $this->dtable_uuid . '/rows/?table_name=' . urlencode($table_name);
        return $this->restCurlClientEx->get($request)->rows;
    }

    public function appendRow($table_name, $row)
    {
        $request = $this->seatable_url . '/dtable-server/api/v1/dtables/' . $this->dtable_uuid . '/rows/';
        $row = '{
			"table_name": "' . $table_name . '",
			"row": ' . json_encode($row) . '
		}';
        return $this->restCurlClientEx->post($request, $row);
    }

    public function updateRow($table_name, $row, $row_id)
    {
        $request = $this->seatable_url . '/dtable-server/api/v1/dtables/' . $this->dtable_uuid . '/rows/';
        $new_row = '{
            "table_name": "' . $table_name . '",
            "row": ' . json_encode($row) . ',
            "row_id": "' . $row_id . '"
        }';
        return $this->restCurlClientEx->put($request, $new_row);
    }

    public function getDTableMetadata()
    {
        $request = $this->seatable_url . '/dtable-server/api/v1/dtables/' . $this->dtable_uuid . '/metadata/';
        return $this->restCurlClientEx->get($request)->metadata;
    }

    public function getColumnsFromTable($table_name)
    {
        $request = $this->seatable_url . '/dtable-server/api/v1/dtables/' . $this->dtable_uuid . '/metadata/';
        $metadata = $this->restCurlClientEx->get($request);

        $item = null;
        foreach ($metadata->metadata->tables as $struct) {
            if ($table_name === $struct->name) {
                $item = $struct;
                break;
            }
        }
        return $item;
    }

    public function listDailyActiveUsers($date = '2020-08-12+00:00:00', $per_page = 5000, $page = 1)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/daily-active-users/?date=' . $date . '&per_page=' . $per_page . '&page=' . $page;
        return $this->restCurlClientEx->get($request);
    }

    // Organisations (admin only)
    // https://docs.seatable.io/published/seatable-api/dtable-web-v2.1-admin/organizations.md

    public function listOrganizations($per_page = 25, $page = 1)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/?per_page=' . $per_page . '&page=' . $page;
        return $this->restCurlClientEx->get($request);
    }

    public function addOrganization($org_name, $admin_email, $admin_name, $password, $max_user_number)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/';
        $org = [
            'org_name' => $org_name,
            'admin_email' => $admin_email,
            'admin_name' => $admin_name,
            'password' => $password,
            'max_user_number' => $max_user_number,
        ];
        return $this->restCurlClientEx->post($request, $org);
    }

    public function deleteOrganization($org_id)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/';
        return $this->restCurlClientEx->delete($request);
    }

    public function updateOrganization($org_id, $org_changes = [])
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/';
        // possible changes are: role, max_user_number, org_name, row_limit, asset_quota
        return $this->restCurlClientEx->put($request, $org_changes);
    }

    public function listOrgUsers($org_id, $is_staff = true, $per_page = 25, $page = 1)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/users/?per_page=' . $per_page . '&page=' . $page;
        return $this->restCurlClientEx->get($request);
    }

    public function addOrgUser($org_id, $email, $pass, $name = "")
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/users/';
        if ($name === "") {
            $name_arr = explode("@", $email);
            $name = $name[0];
        }
        $user = [
            'email' => $email,
            'name' => $name,
            'password' => $pass,
        ];
        return $this->restCurlClientEx->post($request, $user);
    }

    public function deleteOrgUser($org_id, $email)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/users/' . $email . '/';
        return $this->restCurlClientEx->delete($request);
    }

    public function listOrgGroups($org_id)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/groups/';
        return $this->restCurlClientEx->get($request);
    }

    public function listOrgBases($org_id, $per_page = 25, $page = 1)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/dtables/?per_page=' . $per_page . '&page=' . $page;
        return $this->restCurlClientEx->get($request);
    }

    public function getCommonInfo($email)
    {
        $request = $this->seatable_url . '/api/v2.1/user-common-info/' . $email . '/';
        return $this->restCurlClientEx->get($request);
    }

    public function getOrgInfo($org_id)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/';
        return $this->restCurlClientEx->get($request);
    }

    public function addASystemNotificationToAUser($msg, $username)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/sys-user-notifications/';
        $body = [
            'msg' => $msg,
            'username' => $username,
        ];
        return $this->restCurlClientEx->post($request, $body);
    }

    public function listAllSystemNotifications($per_page = 25, $page = 1)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/sys-user-notifications/?per_page=' . $per_page . '&page=' . $page;
        return $this->restCurlClientEx->get($request);
    }

    /**
     * SeaTable: Import dtable (only for own account)
     */
    public function importDTable($workspace_id, $dtable_file)
    {
        $request = $this->seatable_url . '/api/v2.1/workspace/' . ((int) $workspace_id) . '/import-dtable/';

        $form_fields = ['dtable' => $this->restCurlClientEx->curlFile($dtable_file)];

        return $this->restCurlClientEx->post($request, $form_fields);
    }

    /**
     * Upload/Update User Avatar
     * @link https://api.seatable.io/#137dc28b-0f0d-4f18-8e33-993946811ec6
     * @param string $path to image file
     * @return object
     */
    public function updateAvatar(string $path)
    {
        $request = $this->seatable_url . '/api/v2.1/user-avatar/';

        $curlFile = $this->restCurlClientEx->curlFile($path);

        return $this->restCurlClientEx->post($request, ['avatar' => $curlFile]);
    }

    /**
     * Add A Group
     * @link https://api.seatable.io/#4fd4ab0b-1ea8-413a-bb50-bd8a982f1f54
     * @param int $orgId
     * @param string $groupName
     * @param string $groupOwner
     * @return object
     */
    public function addGroup(int $orgId, string $groupName, string $groupOwner)
    {
        $request = $this->seatable_url . '/api/v2.1/org/' . $orgId . '/admin/groups/';

        return $this->restCurlClientEx->post($request, [
            'group_name' => $groupName,
            'group_owner' => $groupOwner,
        ]);
    }

    /**
     * Add a Member to a Group (Batch Add Members to A Group)
     * @link https://api.seatable.io/#277fa732-b785-4933-859b-1f36487ade96
     * @param int $orgId
     * @param int $groupId
     * @param string $email
     * @return object
     */
    public function addGroupMember(int $orgId, int $groupId, string $email)
    {
        $request = $this->seatable_url . '/api/v2.1/org/' . $orgId . '/admin/groups/' . $groupId . '/members/';

        return $this->restCurlClientEx->post($request, [
            'email' => $email,
        ]);
    }

    /**
     * Create A Base API Token
     * @link https://api.seatable.io/#1866e49a-1eb4-4865-9fef-fc28b111c787
     * @param int $workspaceId
     * @param string $baseName
     * @param string $appName
     * @param string $permission
     * @return object
     */
    public function createBaseApiToken(int $workspaceId, string $baseName, string $appName, string $permission = "r")
    {
        $request = $this->seatable_url . '/api/v2.1/workspace/' . $workspaceId . '/dtable/' . rawurlencode($baseName) . '/api-tokens/';
        return $this->restCurlClientEx->post($request, [
            'app_name' => $appName,
            'permission' => $permission,
        ]);
    }

    /**
     * Add A Plugin
     * @link https://api.seatable.io/#e4fb06bd-17af-4dc4-9098-221c293cf9e0
     * @param string $path
     * @return object
     */
    public function addPlugin(string $path)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/dtable-system-plugins/';

        $curlFile = new \CURLFile(realpath($path));

        return $this->restCurlClientEx->post($request, [
            'plugin' => $curlFile,
        ]);
    }

    /**
     * Delete All Notifications
     * @link https://api.seatable.io/#e7803745-e90d-49c7-b41e-790a317b9860
     * @return object
     */
    public function deleteAllNotifications()
    {
        $request = $this->seatable_url . '/api/v2.1/notifications/';

        return $this->restCurlClientEx->delete($request);
    }
}
