<?php
/**
 * SnapshotsApi
 * PHP version 7.4
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Account Operations - User
 *
 * The official SeaTable API Reference (OpenAPI 3.0).
 *
 * The version of the OpenAPI document: 4.4
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.5.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace SeaTable\Client\User;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use SeaTable\Client\ApiException;
use SeaTable\Client\Configuration;
use SeaTable\Client\HeaderSelector;
use SeaTable\Client\ObjectSerializer;

/**
 * SnapshotsApi Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class SnapshotsApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'listSnapshots' => [
            'application/json',
        ],
        'restoreSnapshot' => [
            'multipart/form-data',
        ],
    ];

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation listSnapshots
     *
     * List Snapshots
     *
     * @param  int $workspace_id id of your workspace. (required)
     * @param  string $base_name name of your base. (required)
     * @param  int $page page (optional)
     * @param  int $per_page per_page (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listSnapshots'] to see the possible values for this operation
     *
     * @throws \SeaTable\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return object
     */
    public function listSnapshots($workspace_id, $base_name, $page = null, $per_page = null, string $contentType = self::contentTypes['listSnapshots'][0])
    {
        list($response) = $this->listSnapshotsWithHttpInfo($workspace_id, $base_name, $page, $per_page, $contentType);
        return $response;
    }

    /**
     * Operation listSnapshotsWithHttpInfo
     *
     * List Snapshots
     *
     * @param  int $workspace_id id of your workspace. (required)
     * @param  string $base_name name of your base. (required)
     * @param  int $page (optional)
     * @param  int $per_page (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listSnapshots'] to see the possible values for this operation
     *
     * @throws \SeaTable\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of object, HTTP status code, HTTP response headers (array of strings)
     */
    public function listSnapshotsWithHttpInfo($workspace_id, $base_name, $page = null, $per_page = null, string $contentType = self::contentTypes['listSnapshots'][0])
    {
        $request = $this->listSnapshotsRequest($workspace_id, $base_name, $page, $per_page, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('object' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('object' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'object', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = 'object';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'object',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listSnapshotsAsync
     *
     * List Snapshots
     *
     * @param  int $workspace_id id of your workspace. (required)
     * @param  string $base_name name of your base. (required)
     * @param  int $page (optional)
     * @param  int $per_page (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listSnapshots'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listSnapshotsAsync($workspace_id, $base_name, $page = null, $per_page = null, string $contentType = self::contentTypes['listSnapshots'][0])
    {
        return $this->listSnapshotsAsyncWithHttpInfo($workspace_id, $base_name, $page, $per_page, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listSnapshotsAsyncWithHttpInfo
     *
     * List Snapshots
     *
     * @param  int $workspace_id id of your workspace. (required)
     * @param  string $base_name name of your base. (required)
     * @param  int $page (optional)
     * @param  int $per_page (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listSnapshots'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listSnapshotsAsyncWithHttpInfo($workspace_id, $base_name, $page = null, $per_page = null, string $contentType = self::contentTypes['listSnapshots'][0])
    {
        $returnType = 'object';
        $request = $this->listSnapshotsRequest($workspace_id, $base_name, $page, $per_page, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'listSnapshots'
     *
     * @param  int $workspace_id id of your workspace. (required)
     * @param  string $base_name name of your base. (required)
     * @param  int $page (optional)
     * @param  int $per_page (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listSnapshots'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listSnapshotsRequest($workspace_id, $base_name, $page = null, $per_page = null, string $contentType = self::contentTypes['listSnapshots'][0])
    {

        // verify the required parameter 'workspace_id' is set
        if ($workspace_id === null || (is_array($workspace_id) && count($workspace_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $workspace_id when calling listSnapshots'
            );
        }
        if ($workspace_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$workspace_id" when calling SnapshotsApi.listSnapshots, must be bigger than or equal to 1.');
        }
        
        // verify the required parameter 'base_name' is set
        if ($base_name === null || (is_array($base_name) && count($base_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $base_name when calling listSnapshots'
            );
        }

        if ($page !== null && $page < 1) {
            throw new \InvalidArgumentException('invalid value for "$page" when calling SnapshotsApi.listSnapshots, must be bigger than or equal to 1.');
        }
        
        if ($per_page !== null && $per_page < 1) {
            throw new \InvalidArgumentException('invalid value for "$per_page" when calling SnapshotsApi.listSnapshots, must be bigger than or equal to 1.');
        }
        

        $resourcePath = '/api/v2.1/workspace/{workspace_id}/dtable/{base_name}/snapshots/';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $per_page,
            'per_page', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($workspace_id !== null) {
            $resourcePath = str_replace(
                '{' . 'workspace_id' . '}',
                ObjectSerializer::toPathValue($workspace_id),
                $resourcePath
            );
        }
        // path params
        if ($base_name !== null) {
            $resourcePath = str_replace(
                '{' . 'base_name' . '}',
                ObjectSerializer::toPathValue($base_name),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation restoreSnapshot
     *
     * Restore Snapshot
     *
     * @param  int $workspace_id id of your workspace. (required)
     * @param  string $base_name name of your base. (required)
     * @param  string $commit_id commit_id (required)
     * @param  string $snapshot_name The name of the restored base. Optional. If left blank, a default name will be given. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['restoreSnapshot'] to see the possible values for this operation
     *
     * @throws \SeaTable\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return object
     */
    public function restoreSnapshot($workspace_id, $base_name, $commit_id, $snapshot_name = null, string $contentType = self::contentTypes['restoreSnapshot'][0])
    {
        list($response) = $this->restoreSnapshotWithHttpInfo($workspace_id, $base_name, $commit_id, $snapshot_name, $contentType);
        return $response;
    }

    /**
     * Operation restoreSnapshotWithHttpInfo
     *
     * Restore Snapshot
     *
     * @param  int $workspace_id id of your workspace. (required)
     * @param  string $base_name name of your base. (required)
     * @param  string $commit_id (required)
     * @param  string $snapshot_name The name of the restored base. Optional. If left blank, a default name will be given. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['restoreSnapshot'] to see the possible values for this operation
     *
     * @throws \SeaTable\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of object, HTTP status code, HTTP response headers (array of strings)
     */
    public function restoreSnapshotWithHttpInfo($workspace_id, $base_name, $commit_id, $snapshot_name = null, string $contentType = self::contentTypes['restoreSnapshot'][0])
    {
        $request = $this->restoreSnapshotRequest($workspace_id, $base_name, $commit_id, $snapshot_name, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('object' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('object' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'object', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = 'object';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'object',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation restoreSnapshotAsync
     *
     * Restore Snapshot
     *
     * @param  int $workspace_id id of your workspace. (required)
     * @param  string $base_name name of your base. (required)
     * @param  string $commit_id (required)
     * @param  string $snapshot_name The name of the restored base. Optional. If left blank, a default name will be given. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['restoreSnapshot'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function restoreSnapshotAsync($workspace_id, $base_name, $commit_id, $snapshot_name = null, string $contentType = self::contentTypes['restoreSnapshot'][0])
    {
        return $this->restoreSnapshotAsyncWithHttpInfo($workspace_id, $base_name, $commit_id, $snapshot_name, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation restoreSnapshotAsyncWithHttpInfo
     *
     * Restore Snapshot
     *
     * @param  int $workspace_id id of your workspace. (required)
     * @param  string $base_name name of your base. (required)
     * @param  string $commit_id (required)
     * @param  string $snapshot_name The name of the restored base. Optional. If left blank, a default name will be given. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['restoreSnapshot'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function restoreSnapshotAsyncWithHttpInfo($workspace_id, $base_name, $commit_id, $snapshot_name = null, string $contentType = self::contentTypes['restoreSnapshot'][0])
    {
        $returnType = 'object';
        $request = $this->restoreSnapshotRequest($workspace_id, $base_name, $commit_id, $snapshot_name, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'restoreSnapshot'
     *
     * @param  int $workspace_id id of your workspace. (required)
     * @param  string $base_name name of your base. (required)
     * @param  string $commit_id (required)
     * @param  string $snapshot_name The name of the restored base. Optional. If left blank, a default name will be given. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['restoreSnapshot'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function restoreSnapshotRequest($workspace_id, $base_name, $commit_id, $snapshot_name = null, string $contentType = self::contentTypes['restoreSnapshot'][0])
    {

        // verify the required parameter 'workspace_id' is set
        if ($workspace_id === null || (is_array($workspace_id) && count($workspace_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $workspace_id when calling restoreSnapshot'
            );
        }
        if ($workspace_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$workspace_id" when calling SnapshotsApi.restoreSnapshot, must be bigger than or equal to 1.');
        }
        
        // verify the required parameter 'base_name' is set
        if ($base_name === null || (is_array($base_name) && count($base_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $base_name when calling restoreSnapshot'
            );
        }

        // verify the required parameter 'commit_id' is set
        if ($commit_id === null || (is_array($commit_id) && count($commit_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $commit_id when calling restoreSnapshot'
            );
        }
        if (!preg_match("/^[a-f0-9]{40}$/", $commit_id)) {
            throw new \InvalidArgumentException("invalid value for \"commit_id\" when calling SnapshotsApi.restoreSnapshot, must conform to the pattern /^[a-f0-9]{40}$/.");
        }
        


        $resourcePath = '/api/v2.1/workspace/{workspace_id}/dtable/{base_name}/snapshots/{commit_id}/restore/';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($workspace_id !== null) {
            $resourcePath = str_replace(
                '{' . 'workspace_id' . '}',
                ObjectSerializer::toPathValue($workspace_id),
                $resourcePath
            );
        }
        // path params
        if ($base_name !== null) {
            $resourcePath = str_replace(
                '{' . 'base_name' . '}',
                ObjectSerializer::toPathValue($base_name),
                $resourcePath
            );
        }
        // path params
        if ($commit_id !== null) {
            $resourcePath = str_replace(
                '{' . 'commit_id' . '}',
                ObjectSerializer::toPathValue($commit_id),
                $resourcePath
            );
        }

        // form params
        if ($snapshot_name !== null) {
            $formParams['snapshot_name'] = ObjectSerializer::toFormValue($snapshot_name);
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}