<?php

namespace SeaTable\SeaTableApi;

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
    private $seatable_user;                         # SeaTable user mail to perform REST
    private $seatable_pass;                         # SeaTable user pass to perform REST
    private $seatable_url;                          # url of the SeaTable server
    private $seatable_port = 443;                   # SeaTable port

    private $dtable_uuid;
    private $dtable_server;
    private $dtable_socket;

    /**
     * cUrl response code from SeaTable server
     *
     * @deprecated since 0.1.4, no replacement
     */
    public $seatable_code;

    /**
     * SeaTable response message
     *
     * @deprecated since 0.1.4, no replacement
     * @var string
     */
    public $seatable_status;

    /**
     * Convert response to array instead of object
     *
     * Defaults to false
     *
     * @deprecated since 0.1.4, no replacement
     * @var bool
     */
    public $response_object_to_array = false;

    /**
     * Curl info
     *
     * @deprecated since 0.1.4, no replacement
     * @property $response_info;
     */
    public $response_info;

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
        if (!is_callable('curl_init')) {
            throw new Exception("Curl extension is required");
        }

        if (!empty($option['url']) && (!filter_var($option['url'], FILTER_VALIDATE_URL) || !in_array(parse_url($option['url'], PHP_URL_SCHEME), ['http', 'https'], true))) {
            throw new Exception("SeaTable URL is missing or bad URL format");
        }

        if (!empty($option['port']) && !is_int($option['port'])) {
            throw new Exception("SeaTable port must be a number");
        }

        if (!empty($option['port']) && is_int($option['port']) && $option['port'] !== 443) {
            $this->seatable_port = (int) $option['port'];
            $this->seatable_url = $option['url'] . ':' . $this->seatable_port;
        } else {
            $this->seatable_url = $option['url'];
        }

        if (!empty($option['user'])) {
            $this->seatable_user = strtolower(trim(preg_replace('/\\s+/', '', $option['user'])));
        } else {
            throw new Exception("SeaTable user is missing or has a bad format");
        }

        if (!empty($option['password'])) {
            $this->seatable_pass = $option['password'];
        } else {
            throw new Exception("SeaTable user password is required");
        }

        if (isset($option['http_options']) && !is_array($option['http_options'])) {
            throw new Exception("SeaTable http_options must be an array");
        }

        $this->restCurlClientEx = new RestCurlClientEx($this, $option['http_options'] ?? []);

        /*
         * Return seatable token
         */
        $this->getAuthToken();
    }

    /**
     * @deprecated since 0.1.4, no replacement
     */
    public function get($url, $http_options = [], $api_token = "")
    {
        trigger_error(
            sprintf(
                'Deprecated use of method %s since 0.1.4; there is no replacement.',
                __METHOD__
            ),
            E_USER_DEPRECATED
        );
        return $this->restCurlClientEx->get($url, $http_options, $api_token);
    }

    /**
     * @deprecated since 0.1.4, no replacement
     */
    public function post($url, $form_fields = [], $http_options = [])
    {
        trigger_error(
            sprintf(
                'Deprecated use of method %s since 0.1.4; there is no replacement.',
                __METHOD__
            ),
            E_USER_DEPRECATED
        );
        return $this->restCurlClientEx->post($url, $form_fields, $http_options);
    }

    /**
     * @deprecated since 0.1.4, no replacement
     */
    public function put($url, $data = '', $http_options = [])
    {
        trigger_error(
            sprintf(
                'Deprecated use of method %s since 0.1.4; there is no replacement.',
                __METHOD__
            ),
            E_USER_DEPRECATED
        );
        return $this->restCurlClientEx->put($url, $data, $http_options);
    }

    /**
     * @deprecated since 0.1.4, no replacement
     */
    public function delete($url, $http_options = [])
    {
        trigger_error(
            sprintf(
                'Deprecated use of method %s since 0.1.4; there is no replacement.',
                __METHOD__
            ),
            E_USER_DEPRECATED
        );
        return $this->restCurlClientEx->delete($url, $http_options);
    }

    /**
     * Obtain SeaTable Auth Token
     *
     * @return void
     */
    private function getAuthToken()
    {
        $data = $this->restCurlClientEx->post($this->seatable_url . '/api2/auth-token/', [
            'username' => $this->seatable_user,
            'password' => $this->seatable_pass,
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
     * Output debug data
     *
     * @deprecated since 0.0.4
     */
    public function debug($data)
    {
        trigger_error(
            sprintf(
                'Deprecated use of method %s since 0.0.4; there is no replacement.',
                __METHOD__
            ),
            E_USER_DEPRECATED
        );

        echo "<pre>";
        print_r($data);
        echo "</pre>";
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
     * SeaTable: get getDtableToken (via dtable API-Token)
     */
    public function getDtableToken($input)
    {
        if (array_key_exists("api_token", $input)) {
            $request = $this->seatable_url . '/api/v2.1/dtable/app-access-token/';
            $o = $this->restCurlClientEx->get($request, [], $input['api_token']);
            $this->restCurlClientEx->access_token = $o->access_token;
            $this->dtable_uuid = $o->dtable_uuid;
            $this->dtable_server = $o->dtable_server;
            $this->dtable_socket = $o->dtable_socket;
            return $o;
        } elseif (array_key_exists("table_name", $input) && array_key_exists("workspace_id", $input)) {
            $request = $this->seatable_url . '/api/v2.1/workspace/' . $input['workspace_id'] . '/dtable/' . $input['table_name'] . '/access-token/';
            $o = $this->restCurlClientEx->get($request);
            $this->restCurlClientEx->access_token = $o->access_token;
            $this->dtable_uuid = $o->dtable_uuid;
            $this->dtable_server = $o->dtable_server;
            $this->dtable_socket = $o->dtable_socket;
            return $o;
        } else {
            throw new Exception("getDtableToken parameters are wrong: use either api_token or workspace_id + table_name");
        }
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

    public function getDtableMetadata()
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
        $request = $this->seatable_url . '/api/v2.1/workspace/' . $workspace_id . '/import-dtable/';

        $curl_file = new \CURLFile(realpath($dtable_file));
        $form_fields = ['dtable' => $curl_file];

        return $this->restCurlClientEx->post($request, $form_fields);
    }
}
