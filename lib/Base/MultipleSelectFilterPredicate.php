<?php
/**
 * MultipleSelectFilterPredicate
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
 * MultipleSelectFilterPredicate Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class MultipleSelectFilterPredicate
{
    /**
     * Possible values of this enum
     */
    public const HAS_ANY_OF = 'has_any_of';

    public const HAS_ALL_OF = 'has_all_of';

    public const HAS_NONE_OF = 'has_none_of';

    public const IS_EXACTLY = 'is_exactly';

    public const IS_EMPTY = 'is_empty';

    public const IS_NOT_EMPTY = 'is_not_empty';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::HAS_ANY_OF,
            self::HAS_ALL_OF,
            self::HAS_NONE_OF,
            self::IS_EXACTLY,
            self::IS_EMPTY,
            self::IS_NOT_EMPTY
        ];
    }
}


