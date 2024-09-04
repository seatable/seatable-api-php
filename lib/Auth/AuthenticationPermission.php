<?php
/**
 * AuthenticationPermission
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Authentication
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

namespace SeaTable\Client\Auth;
use \SeaTable\Client\ObjectSerializer;

/**
 * AuthenticationPermission Class Doc Comment
 *
 * @category Class
 * @description - rw for read-write  - r for read-only
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AuthenticationPermission
{
    /**
     * Possible values of this enum
     */
    public const EMPTY = '';

    public const RW = 'rw';

    public const R = 'r';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::EMPTY,
            self::RW,
            self::R
        ];
    }
}


