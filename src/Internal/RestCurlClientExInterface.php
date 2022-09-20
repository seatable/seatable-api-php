<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Internal;

/**
 * RestCurlClientExInterface
 *
 * Extracted Rest-Curl-Client for the SeaTable API to remove get/post/put/delete methods
 * on the main SeaTableApi class.
 *
 * @property string $seatable_token {@internal Auth Token}
 *  {@see \SeaTable\SeaTableApi\SeaTableApi::getAuthToken()}
 *
 * @property string $access_token {@internal Base Access Token}
 *  {@see \SeaTable\SeaTableApi\SeaTableApi::getBaseAppAccessToken()}
 *  {@see \SeaTable\SeaTableApi\SeaTableApi::getBaseAccessToken()}
 *
 * @see RestCurlClientEx
 * @internal
 */
interface RestCurlClientExInterface
{
    /**
     * Perform a GET call to server
     *
     * Additionally, in $response_object is the
     * response from server as it is returned
     * by curl_exec().
     *
     * @param string $url The url to make the call to.
     * @param array $http_options Extra option to pass to curl handle.
     * @return object|array|string|null The response from curl if any
     */
    public function get(string $url, array $http_options = [], string $api_token = "");

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
     * @return object|array|string|null The response from curl if any
     */
    public function post(string $url, $data = [], array $http_options = []);

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
     * @return object|array|string|null The response from curl if any
     */
    public function put(string $url, $data = '', array $http_options = []);

    /**
     * Perform a DELETE call to server
     *
     * Additionally, in $response_object is the
     * response from server as it is returned
     * by curl_exec().
     *
     * @param string $url The url to make the call to.
     * @param array $http_options Extra option to pass to curl handle.
     * @return object|array|string|null The response from curl if any
     */
    public function delete(string $url, array $http_options = []);

    /**
     * create a \CURLFile from a path
     *
     * @param string $path
     * @return \CURLFile
     */
    public function curlFile(string $path): \CURLFile;
}
