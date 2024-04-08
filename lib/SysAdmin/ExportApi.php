<?php
/**
 * ExportApi
 * PHP version 7.4
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Account Operations: System admin
 *
 * The official SeaTable API Reference (OpenAPI 3.0).
 *
 * The version of the OpenAPI document: 4.3
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.5.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace SeaTable\Client\SysAdmin;

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
 * ExportApi Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ExportApi
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
        'exportBase' => [
            'application/json',
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
     * Operation exportBase
     *
     * Export base
     *
     * @param  string $base_uuid The unique identifier of a base. Sometimes also called dtable_uuid. (required)
     * @param  bool $ignore_asset Set this to &#x60;true&#x60; to export the base without assets. Default is &#x60;false&#x60;. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['exportBase'] to see the possible values for this operation
     *
     * @throws \SeaTable\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function exportBase($base_uuid, $ignore_asset = null, string $contentType = self::contentTypes['exportBase'][0])
    {
        $this->exportBaseWithHttpInfo($base_uuid, $ignore_asset, $contentType);
    }

    /**
     * Operation exportBaseWithHttpInfo
     *
     * Export base
     *
     * @param  string $base_uuid The unique identifier of a base. Sometimes also called dtable_uuid. (required)
     * @param  bool $ignore_asset Set this to &#x60;true&#x60; to export the base without assets. Default is &#x60;false&#x60;. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['exportBase'] to see the possible values for this operation
     *
     * @throws \SeaTable\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function exportBaseWithHttpInfo($base_uuid, $ignore_asset = null, string $contentType = self::contentTypes['exportBase'][0])
    {
        $request = $this->exportBaseRequest($base_uuid, $ignore_asset, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation exportBaseAsync
     *
     * Export base
     *
     * @param  string $base_uuid The unique identifier of a base. Sometimes also called dtable_uuid. (required)
     * @param  bool $ignore_asset Set this to &#x60;true&#x60; to export the base without assets. Default is &#x60;false&#x60;. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['exportBase'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function exportBaseAsync($base_uuid, $ignore_asset = null, string $contentType = self::contentTypes['exportBase'][0])
    {
        return $this->exportBaseAsyncWithHttpInfo($base_uuid, $ignore_asset, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation exportBaseAsyncWithHttpInfo
     *
     * Export base
     *
     * @param  string $base_uuid The unique identifier of a base. Sometimes also called dtable_uuid. (required)
     * @param  bool $ignore_asset Set this to &#x60;true&#x60; to export the base without assets. Default is &#x60;false&#x60;. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['exportBase'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function exportBaseAsyncWithHttpInfo($base_uuid, $ignore_asset = null, string $contentType = self::contentTypes['exportBase'][0])
    {
        $returnType = '';
        $request = $this->exportBaseRequest($base_uuid, $ignore_asset, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'exportBase'
     *
     * @param  string $base_uuid The unique identifier of a base. Sometimes also called dtable_uuid. (required)
     * @param  bool $ignore_asset Set this to &#x60;true&#x60; to export the base without assets. Default is &#x60;false&#x60;. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['exportBase'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function exportBaseRequest($base_uuid, $ignore_asset = null, string $contentType = self::contentTypes['exportBase'][0])
    {

        // verify the required parameter 'base_uuid' is set
        if ($base_uuid === null || (is_array($base_uuid) && count($base_uuid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $base_uuid when calling exportBase'
            );
        }
        if (!preg_match("/^[0-9a-fA-F]{8}\\b-[0-9a-fA-F]{4}\\b-[0-9a-fA-F]{4}\\b-[0-9a-fA-F]{4}\\b-[0-9a-fA-F]{12}$/", $base_uuid)) {
            throw new \InvalidArgumentException("invalid value for \"base_uuid\" when calling ExportApi.exportBase, must conform to the pattern /^[0-9a-fA-F]{8}\\b-[0-9a-fA-F]{4}\\b-[0-9a-fA-F]{4}\\b-[0-9a-fA-F]{4}\\b-[0-9a-fA-F]{12}$/.");
        }
        


        $resourcePath = '/api/v2.1/admin/dtables/{base_uuid}/synchronous-export/export-dtable/';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $ignore_asset,
            'ignore_asset', // param base name
            'boolean', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($base_uuid !== null) {
            $resourcePath = str_replace(
                '{' . 'base_uuid' . '}',
                ObjectSerializer::toPathValue($base_uuid),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            [],
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
