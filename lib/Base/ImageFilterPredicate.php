<?php
/**
 * ImageFilterPredicate
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
 * ImageFilterPredicate Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ImageFilterPredicate
{
    /**
     * Possible values of this enum
     */
    public const _EMPTY = 'is_empty';

    public const NOT_EMPTY = 'is_not_empty';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::_EMPTY,
            self::NOT_EMPTY
        ];
    }
}


