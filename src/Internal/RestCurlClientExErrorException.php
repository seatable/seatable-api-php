<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Internal;

use SeaTable\SeaTableApi\Exception;

/**
 * RestCurlClientExErrorException
 *
 * SeaTable Exception thrown when the internal extracted curl client
 * (ext-curl) signals an error (and what ever was imagined to be such
 * a curl error [hint: empty response]).
 *
 * @internal
 */
class RestCurlClientExErrorException extends Exception implements RestCurlClientExException
{
}
