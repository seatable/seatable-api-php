<?php
/**
 * CreatorFilterPredicate
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
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace SeaTable\Client\Base;
use \SeaTable\Client\ObjectSerializer;

/**
 * CreatorFilterPredicate Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class CreatorFilterPredicate
{
    /**
     * Possible values of this enum
     */
    public const CONTAINS = 'contains';

    public const DOES_NOT_CONTAIN = 'does_not_contain';

    public const INCLUDE_ME = 'include_me';

    public const IS = 'is';

    public const IS_NOT = 'is_not';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::CONTAINS,
            self::DOES_NOT_CONTAIN,
            self::INCLUDE_ME,
            self::IS,
            self::IS_NOT
        ];
    }
}


