<?php
/**
 * NumberFilterPredicate
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
 * The version of the OpenAPI document: 4.3
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
 * NumberFilterPredicate Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class NumberFilterPredicate
{
    /**
     * Possible values of this enum
     */
    public const EQUAL = 'equal';

    public const NOT_EQUAL = 'not_equal';

    public const LESS = 'less';

    public const GREATER = 'greater';

    public const LESS_OR_EQUAL = 'less_or_equal';

    public const GREATER_OR_EQUAL = 'greater_or_equal';

    public const IS_EMPTY = 'is empty';

    public const IS_NOT_EMPTY = 'is not empty';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::EQUAL,
            self::NOT_EQUAL,
            self::LESS,
            self::GREATER,
            self::LESS_OR_EQUAL,
            self::GREATER_OR_EQUAL,
            self::IS_EMPTY,
            self::IS_NOT_EMPTY
        ];
    }
}


