<?php
/**
 * FilterConjunction
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
 * The version of the OpenAPI document: 5.2
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
 * FilterConjunction Class Doc Comment
 *
 * @category Class
 * @description If your view has multiple filters you have to decide how the filters are should hang together.
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class FilterConjunction
{
    /**
     * Possible values of this enum
     */
    public const _AND = 'And';

    public const _OR = 'Or';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::_AND,
            self::_OR
        ];
    }
}


