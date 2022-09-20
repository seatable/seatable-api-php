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
     * @var ConnectOptions
     */
    private $connectOptions;

    /**
     * @param array{url: string, user: string, password: string, port?: int, base_api_token?: string, base_app_name?: string, api_token?: string} $options
     * @return ApiOptions
     */
    public static function createFromArray(array $options): ApiOptions
    {
        if (empty($options['url']) || (!filter_var($options['url'], FILTER_VALIDATE_URL) || !in_array(parse_url($options['url'], PHP_URL_SCHEME), ['http', 'https'], true))) {
            throw new Exception("SeaTable URL is missing or bad URL format.");
        }
        if (isset($options['port'])) {
            throw new Exception(sprintf('SeaTable old option "port" found: %d (url is: %s), use port in "url" if you need it.', $options['port'], $options['url']));
        }
        $connectOptions = new ConnectOptions();
        $connectOptions->url = $options['url'];


        // (A) email + passwort
        if (
            (empty($options['user']) && !empty($options['password']))
            || !is_string($options['user'] ?? '')
        ) {
            throw new Exception("SeaTable user is missing or has a bad format.");
        }
        if (
            (!empty($options['user']) && empty($options['password']))
            || !is_string($options['password'] ?? '')
        ) {
            throw new Exception("SeaTable password is missing or has bad format.");
        }
        $connectOptions->user = $options['user'] ?? null;
        $connectOptions->password = $options['password'] ?? null;

        // (B) base-app-api-token
        if (!is_string($options['base_app_api_token'] ?? $options['base_api_token'] ?? '')) {
            throw new Exception("SeaTable base api-token has bad format.");
        }
        if (!is_string($options['base_app_name'] ?? '')) {
            throw new Exception("SeaTable base api-token has bad format.");
        }
        $connectOptions->baseAppApiToken = $options['base_app_api_token'] ?? $options['base_api_token'] ?? null;
        $connectOptions->baseAppName = $options['base_app_name'] ?? null;

        // (C) auth-token
        if (!is_string($options['auth_token'] ?? $options['api_token'] ?? '')) {
            throw new Exception("SeaTable api authentication token has bad format.");
        }
        $connectOptions->authToken = $options['auth_token'] ?? $options['api_token'] ?? null;


        $authTypes = new \stdClass();
        $authTypes->user = isset($connectOptions->user, $connectOptions->password);
        $authTypes->baseAppApiToken = isset($connectOptions->baseAppApiToken);
        $authTypes->authToken = isset($connectOptions->authToken);
        if (!($authTypes->user || $authTypes->baseAppApiToken || $authTypes->authToken)) {
            throw new Exception("SeaTable user is missing or has a bad format.");
        }


        if (isset($options['http_options']) && !is_array($options['http_options'])) {
            throw new Exception("SeaTable http_options must be an array.");
        }
        $connectOptions->curlHttpOptions = $options['http_options'] ?? null;

        return new self($connectOptions);
    }

    public function __construct(ConnectOptions $connectOptions)
    {
        $this->connectOptions = $connectOptions;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->connectOptions->url;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->connectOptions->user;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->connectOptions->password;
    }

    /**
     * @return array|null
     */
    public function getHttpOptions(): array
    {
        return $this->connectOptions->curlHttpOptions ?? [];
    }

    public function authIsUser(): bool
    {
        return isset($this->connectOptions->user, $this->connectOptions->password);
    }

    public function authIsApi(): bool
    {
        return isset($this->connectOptions->baseAppApiToken);
    }

    public function authIsToken(): bool
    {
        return isset($this->connectOptions->authToken);
    }

    public function getBaseApiToken(): ?string
    {
        return $this->connectOptions->baseAppApiToken;
    }

    public function getBaseAppName(): ?string
    {
        return $this->connectOptions->baseAppName;
    }

    public function getAuthToken(): ?string
    {
        return $this->connectOptions->authToken;
    }
}
