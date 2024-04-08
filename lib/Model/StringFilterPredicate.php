<?php
/**
 * StringFilterPredicate
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Base Operations
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

namespace SeaTable\Client\Model;
use \SeaTable\Client\ObjectSerializer;

/**
 * StringFilterPredicate Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class StringFilterPredicate
{
    /**
     * Possible values of this enum
     */
    public const CONTAINS = 'contains';

    public const DOES_NOT_CONTAIN = 'does not contain';

    public const IS = 'is';

    public const IS_NOT = 'is not';

    public const IS_EMPTY = 'is empty';

    public const IS_NOT_EMPTY = 'is not empty';

    public const IS_CURRENT_USERS_ID = 'is current user's ID';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::CONTAINS,
            self::DOES_NOT_CONTAIN,
            self::IS,
            self::IS_NOT,
            self::IS_EMPTY,
            self::IS_NOT_EMPTY,
            self::IS_CURRENT_USERS_ID
        ];
    }
}


