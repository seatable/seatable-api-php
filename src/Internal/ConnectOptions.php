<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Internal;

/**
 * @internal
 */
class ConnectOptions
{
    /** @var string|null */ public $url;
    /** @var string|null */ public $user;
    /** @var string|null */ public $password;
    /** @var array       */ public $curlHttpOptions;
    /** @var string|null */ public $apiToken;
    /** @var string|null */ public $baseApiToken;
    /** @var string|null */ public $baseAppName;
    /** @var string|null */ public $authToken;
}
