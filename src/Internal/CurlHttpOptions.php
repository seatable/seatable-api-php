<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Internal;

/**
 * Class CurlHttpOptions
 *
 * @internal
 */
final class CurlHttpOptions implements \ArrayAccess
{
    /**
     * cUrl options
     * @var array<string, int|string>
     */
    private $http_options = [];

    public function __construct(array $httpOptions)
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

        // FIXME(tk): limited timeout settings patching (e.g. do not run into gateway timeouts)
        foreach ([CURLOPT_TIMEOUT_MS] as $httpOption) {
            isset($httpOptions[$httpOption])
            && $this->http_options[$httpOption] = $httpOptions[$httpOption];
        }
    }

    public function getArrayCopy(): array
    {
        return $this->http_options;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->http_options[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->http_options[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        $this->http_options[$offset] = $value;
    }

    public function offsetUnset($offset): void
    {
        trigger_error("CurlHttpOptions[$offset] unset");
        unset($this->http_options[$offset]);
    }
}
