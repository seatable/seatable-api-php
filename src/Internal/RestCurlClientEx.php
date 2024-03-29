<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Internal;

use SeaTable\SeaTableApi\Exception;

/**
 * RestCurlClientEx
 *
 * Extracted Rest-Curl-Client for the SeaTable API to remove get/post/put/delete methods
 * on the main SeaTableApi class.
 *
 * Perform PUT,GET,POST,DELETE request to your SeaTable server
 *
 * curl function originally from David Paz <https://github.com/davidmpaz/rest-curlclient-php>
 * based on the original work by Alexander Kabanov, Klaus Silveira <https://github.com/shurikk/rest-client-php>
 * and Julien Kirch <https://github.com/rest-client/rest-client> via <https://github.com/archiloque/rest-client>
 *
 * @internal
 */
final class RestCurlClientEx implements RestCurlClientExInterface
{
    /**
     * Auth Token
     *
     * @var string
     * @see \SeaTable\SeaTableApi\SeaTableApi::getAuthToken()
     * @internal
     */
    public $seatable_token;

    /**
     * Base Access Token
     *
     * @var string
     * @see \SeaTable\SeaTableApi\SeaTableApi::getBaseAppAccessToken()
     * @see \SeaTable\SeaTableApi\SeaTableApi::getBaseAccessToken()
     * @internal
     */
    public $access_token;

    /**
     * @var resource cUrl handle
     */
    private $handle;

    /**
     * cUrl options
     *
     * @var CurlHttpOptions
     */
    private $http_options;

    /**
     * cUrl response
     *
     * string if {@see curl_exec()} returns transport ({@see CURLOPT_RETURNTRANSFER} enabled in
     * ctor {@see RestCurlClientEx::__construct()}, default mode of operation)
     *
     * @var bool|string
     */
    private $response_object;

    /**
     * SeaTable static error code
     *
     * @var string[]
     */
    private static $seatable_status_message = [
        200 => 'OK',
        201 => 'CREATED',
        202 => 'ACCEPTED',
        301 => 'MOVED_PERMANENTLY',
        400 => 'BAD_REQUEST',
        403 => 'FORBIDDEN',
        404 => 'NOT_FOUND',
        409 => 'CONFLICT',
        429 => 'TOO_MANY_REQUESTS',
        440 => 'REPO_PASSWD_REQUIRED',
        441 => 'REPO_PASSWD_MAGIC_REQUIRED',
        500 => 'INTERNAL_SERVER_ERROR',
        502 => 'BAD_GATEWAY',
        504 => 'GATEWAY_TIMEOUT',
        520 => 'OPERATION_FAILED',
    ];

    public function __construct(array $httpOptions)
    {
        $this->http_options = new CurlHttpOptions($httpOptions);
    }

    /**
     * Perform a GET call to server
     *
     * Additionally, in $response_object is the
     * response from server as it is returned
     * by curl_exec().
     *
     * @param string $url The url to make the call to.
     * @param array $http_options Extra option to pass to curl handle.
     * @return object|array|string|null The (decoded) response body from curl if any
     */
    public function get(string $url, array $http_options = [], string $api_token = "")
    {
        if ($api_token !== "") {
            $this->http_options[CURLOPT_HTTPHEADER] = ['Authorization: Token ' . $api_token, 'Accept: application/json'];
        } elseif (strpos($url, "/api/v1/") !== false) {
            $this->http_options[CURLOPT_HTTPHEADER] = ['Authorization: Token ' . $this->access_token, 'Accept: application/json', 'Content-Type: multipart/json'];
        } else {
            $this->http_options[CURLOPT_HTTPHEADER] = ['Authorization: Token ' . $this->seatable_token, 'Accept: application/json'];
        }

        $http_options += $this->http_options->getArrayCopy();
        $this->handle = curl_init($url);

        if (!curl_setopt_array($this->handle, $http_options)) {
            throw new Exception("Error setting curl request options.");
        }

        $this->response_object = curl_exec($this->handle);
        $this->http_parse_message($this->response_object);

        curl_close($this->handle);
        return $this->decode($this->response_object);
    }

    /**
     * Perform a POST call to the server
     *
     * Additionally, in $response_object is the
     * response from server as it is returned
     * by curl_exec().
     *
     * @param string $url The url to make the call to.
     * @param string|array $data The data to post. Pass an array to make a http form post.
     * @param array $http_options Extra option to pass to curl handle.
     * @return object The json decoded response from curl
     */
    public function post(string $url, $data = [], array $http_options = [])
    {
        if (strpos($url, "/api/v1/") !== false) {
            $this->http_options[CURLOPT_HTTPHEADER] = ['Authorization: Token ' . $this->access_token, 'Accept: application/json', 'Content-Type: application/json'];
        } else {
            $this->http_options[CURLOPT_HTTPHEADER] = ['Authorization: Token ' . $this->seatable_token, 'Accept: application/json', 'Content-Type: multipart/form-data'];
        }

        $http_options += $this->http_options->getArrayCopy();
        $http_options[CURLOPT_POST] = true;

        unset($http_options[CURLOPT_POSTFIELDS]);
        $http_options[CURLOPT_POSTFIELDS] = $data;

        $this->handle = curl_init($url);

        if (!curl_setopt_array($this->handle, $http_options)) {
            throw new Exception("Error setting curl request options.");
        }

        $this->response_object = curl_exec($this->handle);
        $this->http_parse_message($this->response_object);

        curl_close($this->handle);
        return $this->decode($this->response_object);
    }

    /**
     * Perform a PUT call to the server
     *
     * Additionally, in $response_object is the
     * response from server as it is returned
     * by curl_exec().
     *
     * @param string $url The url to make the call to.
     * @param string|array $data The data to post.
     * @param array $http_options Extra option to pass to curl handle.
     * @return object The response from curl if any
     */
    public function put(string $url, $data = '', array $http_options = [])
    {
        if (strpos($url, "/api/v1/") !== false) {
            $this->http_options[CURLOPT_HTTPHEADER] = ['Authorization: Token ' . $this->access_token, 'Accept: application/json', 'Content-Type: application/json'];
        } else {
            $this->http_options[CURLOPT_HTTPHEADER] = ['Authorization: Token ' . $this->seatable_token, 'Accept: application/json', 'Content-Type: multipart/form-data'];
        }
        $http_options += $this->http_options->getArrayCopy();
        $http_options[CURLOPT_CUSTOMREQUEST] = 'PUT';

        $http_options[CURLOPT_POSTFIELDS] = $data;

        $this->handle = curl_init($url);

        if (!curl_setopt_array($this->handle, $http_options)) {
            throw new Exception("Error setting curl request options.");
        }

        $this->response_object = curl_exec($this->handle);
        $this->http_parse_message($this->response_object);

        curl_close($this->handle);
        return $this->decode($this->response_object);
    }

    /**
     * Perform a DELETE call to server
     *
     * Additionally, in $response_object is the
     * response from server as it is returned
     * by curl_exec().
     *
     * @param string $url The url to make the call to.
     * @param array $http_options Extra option to pass to curl handle.
     * @return object The response from curl if any
     */
    public function delete(string $url, array $http_options = [])
    {
        $this->http_options[CURLOPT_HTTPHEADER] = ['Authorization: Token ' . $this->seatable_token, 'Accept: application/json'];
        $http_options += $this->http_options->getArrayCopy();
        $http_options[CURLOPT_CUSTOMREQUEST] = 'DELETE';
        $this->handle = curl_init($url);

        if (!curl_setopt_array($this->handle, $http_options)) {
            throw new Exception("Error setting curl request options.");
        }

        $this->response_object = curl_exec($this->handle);
        $this->http_parse_message($this->response_object);

        curl_close($this->handle);
        return $this->decode($this->response_object);
    }

    /**
     * create a \CURLFile from a path
     *
     * @param string $path
     * @return \CURLFile
     */
    public function curlFile(string $path): \CURLFile
    {
        $realPath = realpath($path);
        if (false === $realPath) {
            throw new \InvalidArgumentException(
                sprintf('failed to resolve file path: "%s"', $path)
            );
        }

        if (!is_file($realPath) || !is_readable($realPath)) {
            throw new \InvalidArgumentException(
                sprintf('not a readable file: "%s"', $path)
            );
        }

        return new \CURLFile($realPath);
    }

    /**
     * Decode answer to object format instead of json
     *
     * @param string $jsonText encoded response
     * @return object|array|string|null on some endpoints this can differ, e.g. string on /ping
     */
    private function decode(string $jsonText)
    {
        return json_decode($jsonText, false);
    }

    /**
     * Analyse curl answer
     *
     * @param string|bool $result The curl object
     * @throws Exception
     */
    private function http_parse_message($result): void
    {
        if ($result === '' || $result === false) {
            $message = sprintf(
                'curl error (%d): "%s"%s',
                curl_errno($this->handle),
                curl_error($this->handle),
                $result === '' ? ' (empty response)' : ''
            );
            throw new RestCurlClientExErrorException($message, -1);
        }

        $info = curl_getinfo($this->handle);
        $code = (int) $info['http_code'];

        $message = self::$seatable_status_message[$code] ?? 'UNKNOWN';

        // weitere fehlermeldungen von https://docs.seatable.io/published/seatable-api/home.md

        if (200 <= $code && $code <= 207) {
            return;
        }

        if ($code === 404) {
            throw new RestCurlClientExResponseException($result, $code . ' - ' . $message . ' - ' . curl_error($this->handle), $code);
        }

        if ($code === 403) {
            throw new RestCurlClientExResponseException($result, "Error " . $code . ': ' . $message . ': ' . $result, $code);
        }

        $maxLen = 256;
        $len = strlen($result);
        $overlong = $len > $maxLen;
        $message = sprintf(
            '%d - %s - Response: (%d)"%s%s',
            $code,
            $message,
            $len,
            $overlong ? sprintf('... (%d more)', $len - $maxLen) : '"',
            addcslashes($overlong ? substr($result, 0, $maxLen) : $result, "\0..\37\\\"\177..\377")
        );
        throw new RestCurlClientExResponseException($result, $message, $code);
    }
}
