<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Internal;

use SeaTable\SeaTableApi\Exception;
use Throwable;

/**
 * RestCurlClientExResponseException
 *
 * SeaTable Exception thrown when the internal extracted curl client
 * (ext-curl) gets a response but the HTTP response code is not 2xx-ish.
 *
 * @internal
 */
class RestCurlClientExResponseException extends Exception implements RestCurlClientExException
{
    private $result;

    public function __construct(string $result, $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->result = $result;
    }

    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * decode the result
     *
     * commonly object, null can signal a non-decode-able result, then {@see getResult()} for raw string result.
     *
     * @return null|string|int|float|array|object
     */
    public function decodeResult()
    {
        return json_decode($this->result, false, JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
}
