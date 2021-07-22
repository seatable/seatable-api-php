<?php

namespace SeaTable\SeaTableApi;

/**
 * SeaTable API - PHP class wrapper
 * Perform PUT,GET,POST,DELETE request to your SeaTable server
 *
 * @author <cdb@seatable.io> (thanks for the inspiration by <ben@netcap.fr>)
 * @copyright 2020, 2021 SeaTable GmbH
 * @license APACHE-2.0
 *
 * SeaTable - Next-generation online spreadsheet <https://seatable.io>
 *
 * SeaTable API <https://api.seatable.io/> (formerly: <https://docs.seatable.io/published/seatable-api/home.md>)
 *
 * cURL function from David Paz <https://github.com/davidmpaz/rest-curlclient-php>
 * based on the original work by Alexander Kabanov, Klaus Silveira <https://github.com/shurikk/rest-client-php>
 * and Julien Kirch <https://github.com/rest-client/rest-client> via <https://github.com/archiloque/rest-client>
 */
class SeaTableApi
{
    private $seatable_user;                         # SeaTable user mail to perform REST
    private $seatable_pass;                         # SeaTable user pass to perform REST
    private $seatable_url;                          # url of the SeaTable server
    private $seatable_port = 443;                   # SeaTable port
    private $seatable_token;                        # ...

    private $access_token;                          # ...
    private $dtable_uuid;
    private $dtable_server;
    private $dtable_socket;

    public $seatable_code;                          # curl response code from SeaTable server
    public $seatable_status;                        # SeaTable response message
    private $handle;                                # Current curl object
    private $http_options = [];                     # Current curl options
    private $response_object;                       # Curl response
    public $response_object_to_array = false;       # Convert response to array instead of object - default false
    public $response_info;                          # Curl info

    # SeaTable static error code
    private $seatable_status_message = [
        '200' => 'OK',
        '201' => 'CREATED',
        '202' => 'ACCEPTED',
        '301' => 'MOVED_PERMANENTLY',
        '400' => 'BAD_REQUEST',
        '403' => 'FORBIDDEN',
        '404' => 'NOT_FOUND',
        '409' => 'CONFLICT',
        '429' => 'TOO_MANY_REQUESTS',
        '440' => 'REPO_PASSWD_REQUIRED',
        '441' => 'REPO_PASSWD_MAGIC_REQUIRED',
        '500' => 'INTERNAL_SERVER_ERROR',
        '502' => 'GATEWAY-TIMEOUT',
        '520' => 'OPERATION_FAILED',
    ];

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

        if (isset($option['url']) && !empty($option['url']) && (!filter_var($option['url'], FILTER_VALIDATE_URL) || !in_array(parse_url($option['url'], PHP_URL_SCHEME), ['http', 'https'], true))) {
            throw new Exception("SeaTable URL is missing or bad URL format");
        }

        if (isset($option['port']) && !empty($option['port']) && !is_int($option['port'])) {
            throw new Exception("SeaTable port must be a number");
        }

        if (isset($option['port']) && !empty($option['port']) && is_int($option['port']) && $option['port'] != 443) {
            $this->seatable_port = (int) $option['port'];
            $this->seatable_url = $option['url'] . ':' . $this->seatable_port;
        } else {
            $this->seatable_url = $option['url'];
        }

        if (isset($option['user']) && !empty($option['user'])) {
            $this->seatable_user = strtolower(trim(preg_replace('/\\s+/', '', $option['user'])));
        } else {
            throw new Exception("SeaTable user is missing or has a bad format");
        }

        if (isset($option['password']) && !empty($option['password'])) {
            $this->seatable_pass = $option['password'];
        } else {
            throw new Exception("SeaTable user password is required");
        }

        /*
         * Default curl config
         */
        $this->http_options[CURLOPT_RETURNTRANSFER] = true;
        $this->http_options[CURLOPT_FOLLOWLOCATION] = false;

        if (isset($option['http_options']) && !is_array($option['http_options'])) {
            throw new Exception("SeaTable http_options must be an array");
        }
        foreach ([CURLOPT_SSL_VERIFYPEER, CURLOPT_SSL_VERIFYHOST] as $httpOption) {
            isset($option['http_options'][$httpOption])
                && $this->http_options[$httpOption] = $option['http_options'][$httpOption]
                ;
        }

        /*
         * Return seatable token
         */
        $this->getAuthToken();
    }

    /**
     * Return SeaTable token
     *
     * @return - The SeaTable auth token
     */
    private function getAuthToken()
    {
        $data = $this->post($this->seatable_url . '/api2/auth-token/', [
            'username' => $this->seatable_user,
            'password' => $this->seatable_pass,
        ]);
        $this->seatable_token = (string)$data->token;
    }

    /**
     * Decode answer to object format instead of json
     *
     * @param array $data - The json encoded response
     * @param bool $this->response_object_to_array default false - If true return array from json instead of object
     */
    private function decode($data)
    {
        if (!$this->response_object_to_array) {
            return json_decode($data);
        } else {
            return json_decode($data, true);
        }
    }


    /**
     * Analyse curl answer
     *
     * @param array $res The curl object
     * @throws Exception
     */
    private function http_parse_message($res)
    {
        if (! $res) {
            throw new Exception(curl_error($this->handle), -1);
        }

        $this->response_info = curl_getinfo($this->handle);
        $code = $this->response_info['http_code'];

        $this->seatable_code = $code;
        $this->seatable_status = $this->seatable_status_message[$code];

        // weitere fehlermeldungen von https://docs.seatable.io/published/seatable-api/home.md

        if ($code == 404) {
            throw new Exception($this->seatable_code . ' - ' . $this->seatable_status . ' - ' . curl_error($this->handle));
        } elseif ($code == 403 || $code == 404) {
            throw new Exception("Error " . $this->seatable_code . ': ' . $this->seatable_status . ': ' . $res);
        } elseif ($code >= 400 && $code <= 600) {
            throw new Exception($this->seatable_code . ' - ' . $this->seatable_status . ' - ' . 'Server response status was: ' . $code . ' with response: [' . $res . ']', $code);
        } elseif (!in_array($code, range(200, 207))) {
            throw new Exception($this->seatable_code . ' - ' . $this->seatable_status . ' - ' . 'Server response status was: ' . $code . ' with response: [' . $res . ']', $code);
        }
    }

    /**
     * Perform a GET call to server
     *
     * Additionally in $response_object and $response_info are the
     * response from server and the response info as it is returned
     * by curl_exec() and curl_getinfo() respectively.
     *
     * @param string $url The url to make the call to.
     * @param array $http_options Extra option to pass to curl handle.
     * @return string The response from curl if any
     */
    public function get($url, $http_options = [], $api_token = "")
    {
        if ($api_token != "") {
            $this->http_options[CURLOPT_HTTPHEADER] = ['Authorization: Token ' . $api_token, 'Accept: application/json; charset=utf-8; indent=4'];
        } elseif (strpos($url, "/api/v1/dtables/") !== false) {
            $this->http_options[CURLOPT_HTTPHEADER] = ['Authorization: Token ' . $this->access_token, 'Accept: application/json; charset=utf-8; indent=4', 'Content-Type: multipart/json'];
        } else {
            $this->http_options[CURLOPT_HTTPHEADER] = ['Authorization: Token ' . $this->seatable_token, 'Accept: application/json; charset=utf-8; indent=4'];
        }

        $http_options += $this->http_options;
        $this->handle = curl_init($url);

        if (! curl_setopt_array($this->handle, $http_options)) {
            throw new Exception("Error setting cURL request options");
        }

        $this->response_object = curl_exec($this->handle);
        $this->http_parse_message($this->response_object);

        curl_close($this->handle);
        return $this->decode($this->response_object);
    }

    /**
     * Perform a POST call to the server
     *
     * Additionally in $response_object and $response_info are the
     * response from server and the response info as it is returned
     * by curl_exec() and curl_getinfo() respectively.
     *
     * @param string $url The url to make the call to.
     * @param string|array $form_fields The data to post. Pass an array to make a http form post.
     * @param array $http_options Extra option to pass to curl handle.
     * @return string The response from curl if any
     */
    public function post($url, $form_fields = [], $http_options = [])
    {
        if (strpos($url, "/api/v1/dtables/") !== false) {
            $this->http_options[CURLOPT_HTTPHEADER] = ['Authorization: Token ' . $this->access_token, 'Accept: application/json', 'Content-Type: application/json'];
        } else {
            $this->http_options[CURLOPT_HTTPHEADER] = ['Authorization: Token ' . $this->seatable_token, 'Accept: application/json; charset=utf-8; indent=4', 'Content-Type: multipart/form-data'];
        }

        $http_options += $this->http_options;
        $http_options[CURLOPT_POST] = true;
        $http_options[CURLOPT_POSTFIELDS] = $form_fields;

        $this->handle = curl_init($url);

        if (! curl_setopt_array($this->handle, $http_options)) {
            throw new Exception("Error setting cURL request options.");
        }

        $this->response_object = curl_exec($this->handle);
        $this->http_parse_message($this->response_object);

        curl_close($this->handle);
        return $this->decode($this->response_object);
    }

    /**
     * Perform a PUT call to the server
     *
     * Additionally in $response_object and $response_info are the
     * response from server and the response info as it is returned
     * by curl_exec() and curl_getinfo() respectively.
     *
     * @param string $url The url to make the call to.
     * @param string|array $data The data to post.
     * @param array $http_options Extra option to pass to curl handle.
     * @return string The response from curl if any
     */
    public function put($url, $data = '', $http_options = [])
    {
        $this->http_options[CURLOPT_HTTPHEADER] = ['Authorization: Token ' . $this->seatable_token, 'Accept: application/json; charset=utf-8; indent=4'];
        $http_options += $this->http_options;
        $http_options[CURLOPT_CUSTOMREQUEST] = 'PUT';
        $http_options[CURLOPT_POSTFIELDS] = $data;
        $this->handle = curl_init($url);

        if (! curl_setopt_array($this->handle, $http_options)) {
            throw new Exception("Error setting cURL request options.");
        }

        $this->response_object = curl_exec($this->handle);
        $this->http_parse_message($this->response_object);

        curl_close($this->handle);
        return $this->decode($this->response_object);
    }

    /**
     * Perform a DELETE call to server
     *
     * Additionally in $response_object and $response_info are the
     * response from server and the response info as it is returned
     * by curl_exec() and curl_getinfo() respectively.
     *
     * @param string $url The url to make the call to.
     * @param array $http_options Extra option to pass to curl handle.
     * @return string The response from curl if any
     */
    public function delete($url, $http_options = [])
    {
        $this->http_options[CURLOPT_HTTPHEADER] = ['Authorization: Token ' . $this->seatable_token, 'Accept: application/json; charset=utf-8; indent=4'];
        $http_options += $this->http_options;
        $http_options[CURLOPT_CUSTOMREQUEST] = 'DELETE';
        $this->handle = curl_init($url);

        if (! curl_setopt_array($this->handle, $http_options)) {
            throw new Exception("Error setting cURL request options.");
        }

        $this->response_object = curl_exec($this->handle);
        $this->http_parse_message($this->response_object);

        curl_close($this->handle);
        return $this->decode($this->response_object);
    }

    /**
     * (all) Ping SeaTable server
     *
     * @return string, "pong" if auth token is correct
     */
    public function ping()
    {
        $request = $this->seatable_url . '/api2/auth/ping/';
        return $this->get($request);
    }

    /**
     * Output debug data
     *
     * @deprecated since 0.0.4
     */
    public function debug($data)
    {
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
        return $this->get($request);
    }

    /**
     * (admin only) Return all users on the SeaTable Server
     * https://docs.seatable.io/published/seatable-api/dtable-web-v2.1-admin/users.md
     *
     * @param int $per_page        Number of users that should be shown (default = 25)
     * @param int $page            Select Page the users shown from (default 1)
     * @return object|array
     */
    public function listUsers($per_page = 25, $page = 1)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/users/?per_page=' . $per_page . '&page=' . $page;
        return $this->get($request);
    }

    /**
     * (admin only)
     * @return int
     */
    public function getTotalUsers()
    {
        $request = $this->seatable_url . '/api/v2.1/admin/users/?per_page=1&page=1';
        return $this->get($request)->total_count;
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
        return $this->post($request, $form);
    }

    /**
     * @return object|array "user_list"
     */
    public function searchUser($query)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/search-user/?query=' . $query;
        return $this->get($request);
    }

    public function updateUser($email, $changes = [])
    {
        $request = $this->seatable_url . '/api/v2.1/admin/users/' . $email . '/';
        // erlaubt ist: role, ...
        return $this->put($request, $changes);
    }

    public function activateUser($email)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/users/' . $email . '/';
        $form = [
            'is_active' => "true",
        ];
        return $this->put($request, $form);
    }

    public function deactivateUser($email)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/users/' . $email . '/';
        $form = [
            'is_active' => "false",
        ];
        return $this->put($request, $form);
    }

    // (admin only)
    public function deleteUser($email)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/users/' . $email . '/';
        $d = [];
        return $this->delete($request, $d);
    }

    /**
     * List all workspaces
     * @return array
     */
    public function listAllWorkspaces()
    {
        $request = $this->seatable_url . '/api/v2.1/workspaces/';
        return $this->get($request)->workspace_list;
    }

    public function listStarredWorkspaces()
    {
        $request = $this->seatable_url . '/api/v2.1/workspaces/';
        return $this->get($request)->starred_dtable_list;
    }

    public function updateDTable($workspace_id, $dtable_name, $changes = [])
    {
        $changes['name'] = $dtable_name;
        $request = $this->seatable_url . '/api/v2.1/workspace/' . $workspace_id . '/dtable/';
        return $this->put($request, $changes);
    }

    public function copyDTableExternalLink($link, $dst_workspace_id)
    {
        $request = $this->seatable_url . '/api/v2.1/dtable-external-link/dtable-copy/';
        $f = [
            'link' => $link,
            'dst_workspace_id' => $dst_workspace_id,
        ];
        return $this->post($request, $f);
    }

    /**
     * SeaTable: get getDtableToken (via dtable API-Token)
     */
    public function getDtableToken($input)
    {
        if (array_key_exists("api_token", $input)) {
            $request = $this->seatable_url . '/api/v2.1/dtable/app-access-token/';
            $o = $this->get($request, [], $input['api_token']);
            $this->access_token = $o->access_token;
            $this->dtable_uuid = $o->dtable_uuid;
            $this->dtable_server = $o->dtable_server;
            $this->dtable_socket = $o->dtable_socket;
            return $o;
        } elseif (array_key_exists("table_name", $input) && array_key_exists("workspace_id", $input)) {
            $request = $this->seatable_url . '/api/v2.1/workspace/' . $input['workspace_id'] . '/dtable/' . $input['table_name'] . '/access-token/';
            $o = $this->get($request);
            $this->access_token = $o->access_token;
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
        return $this->get($request)->rows;
    }

    public function appendRow($table_name, $row)
    {
        $request = $this->seatable_url . '/dtable-server/api/v1/dtables/' . $this->dtable_uuid . '/rows/';
        $row = '{
			"table_name": "' . $table_name . '",
			"row": ' . json_encode($row) . '
		}';
        return $this->post($request, $row);
    }

    public function updateRow($table_name, $row, $row_id)
    {
        $request = $this->seatable_url . '/dtable-server/api/v1/dtables/' . $this->dtable_uuid . '/rows/';
        $new_row = '{
            "table_name": "' . $table_name . '",
            "row": ' . json_encode($row) . ',
            "row_id": "' . $row_id . '"
        }';
        return $this->put($request, $new_row);
    }

    public function getDtableMetadata()
    {
        $request = $this->seatable_url . '/dtable-server/api/v1/dtables/' . $this->dtable_uuid . '/metadata/';
        return $this->get($request)->metadata;
    }

    public function getColumnsFromTable($table_name)
    {
        $request = $this->seatable_url . '/dtable-server/api/v1/dtables/' . $this->dtable_uuid . '/metadata/';
        $metadata = $this->get($request);

        $item = null;
        foreach ($metadata->metadata->tables as $struct) {
            if ($table_name == $struct->name) {
                $item = $struct;
                break;
            }
        }
        return $item;
    }

    public function listDailyActiveUsers($date = '2020-08-12+00:00:00', $per_page = 5000, $page = 1)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/daily-active-users/?date=' . $date . '&per_page=' . $per_page . '&page=' . $page;
        return $this->get($request);
    }

    // Organisations (admin only)
    // https://docs.seatable.io/published/seatable-api/dtable-web-v2.1-admin/organizations.md

    public function listOrganizations($per_page = 25, $page = 1)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/?per_page=' . $per_page . '&page=' . $page;
        return $this->get($request);
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
        return $this->post($request, $org);
    }

    public function deleteOrganization($org_id)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/';
        return $this->delete($request);
    }

    public function updateOrganization($org_id, $org_changes = [])
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/';
        // possible changes are: role, max_user_number, org_name, row_limit, asset_quota
        return $this->put($request, $org_changes);
    }

    public function listOrgUsers($org_id, $is_staff = true, $per_page = 25, $page = 1)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/users/?per_page=' . $per_page . '&page=' . $page;
        return $this->get($request);
    }

    public function addOrgUser($org_id, $email, $pass, $name = "")
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/users/';
        if ($name == "") {
            $name_arr = explode("@", $email);
            $name = $name[0];
        }
        $user = [
            'email' => $email,
            'name' => $name,
            'password' => $pass,
        ];
        return $this->post($request, $user);
    }

    public function deleteOrgUser($org_id, $email)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/users/' . $email . '/';
        return $this->delete($request);
    }

    public function listOrgGroups($org_id)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/groups/';
        return $this->get($request);
    }

    public function listOrgBases($org_id, $per_page = 25, $page = 1)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/dtables/?per_page=' . $per_page . '&page=' . $page;
        return $this->get($request);
    }

    public function getCommonInfo($email)
    {
        $request = $this->seatable_url . '/api/v2.1/user-common-info/' . $email . '/';
        return $this->get($request);
    }

    public function getOrgInfo($org_id)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/organizations/' . $org_id . '/';
        return $this->get($request);
    }

    public function addASystemNotificationToAUser($msg, $username)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/sys-user-notifications/';
        $body = [
            'msg' => $msg,
            'username' => $username,
        ];
        return $this->post($request, $body);
    }

    public function listAllSystemNotifications($per_page = 25, $page = 1)
    {
        $request = $this->seatable_url . '/api/v2.1/admin/sys-user-notifications/?per_page=' . $per_page . '&page=' . $page;
        return $this->get($request);
    }

    /**
     * SeaTable: Import dtable (only for own account)
     */
    public function importDTable($workspace_id, $dtable_file)
    {
        $request = $this->seatable_url . '/api/v2.1/workspace/' . $workspace_id . '/import-dtable/';

        $curl_file = new \CURLFile(realpath($dtable_file));
        $form_fields = ['dtable' => $curl_file];

        return $this->post($request, $form_fields);
    }
}
