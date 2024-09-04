<?php
/**
 * EmailFilterPredicate
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Base Operations (from 4.4)
 *
 * The official SeaTable API Reference (OpenAPI 3.0).
 *
 * The version of the OpenAPI document: 5.0
 * Generated by: https://openapi-generator.tech
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace SeaTable\Client\Base;
use \SeaTable\Client\ObjectSerializer;

/**
 * EmailFilterPredicate Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class EmailFilterPredicate
{
    /**
     * Possible values of this enum
     */
    public const CONTAINS = 'contains';

    public const DOES_NOT_CONTAIN = 'does_not_contain';

    public const IS = 'is';

    public const IS_NOT = 'is_not';

    public const IS_EMPTY = 'is_empty';

    public const IS_NOT_EMPTY = 'is_not_empty';

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
            self::IS_NOT_EMPTY
        ];
    }
}


