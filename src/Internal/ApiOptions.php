<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Internal;

use SeaTable\SeaTableApi\Internal\ApiOptionsException as Exception;

/**
 * Class ApiOptions
 *
 * @internal
 */
final class ApiOptions
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var array
     */
    private $curlHttpOptions;

    public static function createFromArray(array $options): ApiOptions
    {
        if (!empty($options['url']) && (!filter_var($options['url'], FILTER_VALIDATE_URL) || !in_array(parse_url($options['url'], PHP_URL_SCHEME), ['http', 'https'], true))) {
            throw new Exception("SeaTable URL is missing or bad URL format");
        }

        if (!empty($options['port']) && !is_int($options['port'])) {
            throw new Exception("SeaTable port must be a number");
        }

        if (!empty($options['port']) && is_int($options['port']) && $options['port'] !== 443) {
            $url = $options['url'] . ':' . (int) $options['port'];
        } else {
            $url = $options['url'];
        }

        if (!empty($options['user'])) {
            $user = strtolower(trim(preg_replace('/\\s+/', '', $options['user'])));
        } else {
            throw new Exception("SeaTable user is missing or has a bad format");
        }

        if (!empty($options['password'])) {
            $password = $options['password'];
        } else {
            throw new Exception("SeaTable user password is required");
        }

        if (isset($options['http_options']) && !is_array($options['http_options'])) {
            throw new Exception("SeaTable http_options must be an array");
        }
        $http_options = $options['http_options'] ?? null;

        return new self($url, $user, $password, $http_options);
    }

    public function __construct(string $url, string $user, string $password, array $curlHttpOptions = null)
    {
        $this->url = $url;
        $this->user = $user;
        $this->pass = $password;
        $this->curlHttpOptions = $curlHttpOptions ?? [];
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->pass;
    }

    /**
     * @return array|null
     */
    public function getHttpOptions(): array
    {
        return $this->curlHttpOptions;
    }
}
