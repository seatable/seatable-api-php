<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Internal;

use SeaTable\SeaTableApi\Exception;
use SeaTable\SeaTableApi\SeaTableApi;

/**
 * RestCurlClientEx
 *
 * Extracted Rest-Curl-Client for the SeaTable API to remove get/pust/put/delete methods
 * on the main SeaTableApi class.
 *
 * Perform PUT,GET,POST,DELETE request to your SeaTable server
 *
 * cURL function from David Paz <https://github.com/davidmpaz/rest-curlclient-php>
 * based on the original work by Alexander Kabanov, Klaus Silveira <https://github.com/shurikk/rest-client-php>
 * and Julien Kirch <https://github.com/rest-client/rest-client> via <https://github.com/archiloque/rest-client>
 *
 * @internal
 */
class RestCurlClientEx
{
    /**
     * @var SeaTableApi
     */
    private $api;

    /**
     * @var string
     * @see \SeaTable\SeaTableApi\SeaTableApi::getAuthToken
     * @internal
     */
    public $seatable_token;

    /**
     * @var string
     * @see \SeaTable\SeaTableApi\SeaTableApi::getDtableToken
     * @internal
     */
    public $access_token;

    private $handle;                                # cUrl handle
    private $http_options = [];                     # cUrl options

    private $seatable_code;                         # (ex-public) curl response code from SeaTable server
    private $seatable_status;                       # (ex-public) SeaTable response message
    private $response_info;                         # (ex-public) Curl info
    private $response_object;                       # Curl response
    private $response_object_to_array = false;      # (ex-public) Convert response to array instead of object - default false

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

    public function __construct(SeaTableApi $api, array $httpOptions)
    {
        /*
         * Default curl config
         */
        $this->http_options[CURLOPT_RETURNTRANSFER] = true;
        $this->http_options[CURLOPT_FOLLOWLOCATION] = false;

        foreach ([CURLOPT_SSL_VERIFYPEER, CURLOPT_SSL_VERIFYHOST] as $httpOption) {
            isset($httpOptions[$httpOption])
            && $this->http_options[$httpOption] = $httpOptions[$httpOption];
        }

        $this->api = $api;
        $this->response_object_to_array = &$api->response_object_to_array;
    }

    /**
     * Perform a GET call to server
     *
     * Additionally, in $response_object and $response_info are the
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

        if (!curl_setopt_array($this->handle, $http_options)) {
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
     * Additionally, in $response_object and $response_info are the
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

        if (!curl_setopt_array($this->handle, $http_options)) {
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
     * Additionally, in $response_object and $response_info are the
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

        if (!curl_setopt_array($this->handle, $http_options)) {
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
     * Additionally, in $response_object and $response_info are the
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

        if (!curl_setopt_array($this->handle, $http_options)) {
            throw new Exception("Error setting cURL request options.");
        }

        $this->response_object = curl_exec($this->handle);
        $this->http_parse_message($this->response_object);

        curl_close($this->handle);
        return $this->decode($this->response_object);
    }

    /**
     * Decode answer to object format instead of json
     *
     * @param string $data - The json encoded response
     * @param bool $this- >response_object_to_array default false - If true return array from json instead of object
     */
    private function decode($data)
    {
        if (!$this->response_object_to_array) {
            return json_decode($data, false);
        } else {
            $location = '';
            $callPoint = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3)[2] ?? null;
            if ($callPoint && isset($callPoint['file'], $callPoint['line'])) {
                $location = sprintf(' use near %s on line %s', $callPoint['file'], $callPoint['line']);
            }
            trigger_error(
                sprintf(
                    'the use of SeaTableApi->response_object_to_array is deprecated since 0.1.4%s; there is no replacement.',
                    $location
                ),
                E_USER_DEPRECATED
            );

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
        if (!$res) {
            throw new Exception(curl_error($this->handle), -1);
        }

        $this->api->response_info = $this->response_info = curl_getinfo($this->handle);
        $code = $this->response_info['http_code'];

        $this->api->seatable_code = $this->seatable_code = $code;
        $this->api->seatable_status = $this->seatable_status = $this->seatable_status_message[$code];

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
}
