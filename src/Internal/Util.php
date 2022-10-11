<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Internal;

use ReflectionException;
use ReflectionObject;
use SeaTable\SeaTableApi\SeaTableApi;

/**
 * Class Util
 *
 * @internal
 */
class Util
{
    /**
     * backquote string for SeaTable SQL
     *
     * > You can use back quote ("``") to enclose column references, when
     * > column name contains space or "-". E.g. select abs(column-a) from table;
     *
     * @link https://seatable.github.io/seatable-scripts/python/sql/#use-formulas-in-sql-query
     *
     * @param string $value
     * @return string quoted string (backticks)
     */
    public static function quoteSqlTableName(string $value): string
    {
        if (false !== strpos($value, '`')) {
            throw new \InvalidArgumentException(
                sprintf(
                    '\$value string must not contain backtick (`), given: "%s"',
                    addcslashes($value, "\0..\37\\\"\177..\377")
                )
            );
        }
        return "`{$value}`";
    }

    /**
     * Get Base-Name directly after base authentication
     *
     * @param SeaTableApi $api
     * @return string|null
     * @internal spares a second API request by accessing an internal property
     *           which is prone to race conditions and requires version pinning.
     */
    public static function tryBaseAuthDtableName(SeaTableApi $api): ?string
    {
        $try = self::tryBaseAuth($api);
        return $try ? $try->dtable_name ?? null : null;
    }

    /**
     * Get Base-Auth blob directly after base authentication
     *
     * @param SeaTableApi $api
     * @return object|null
     * @internal spares a second API request by accessing an internal property
     *           which is prone to race conditions and requires version pinning.
     */
    public static function tryBaseAuth(SeaTableApi $api): ?object
    {
        $fProp = static function (?object $o, string $n) {
            if (null === $o) {
                return null;
            }
            try {
                return self::getReflectionProperty($o, $n)->getValue($o);
            } catch (ReflectionException $ex) {
                return null;
            }
        };
        try {
            $v = $fProp($api, 'restCurlClientEx');
            if (!($v instanceof RestCurlClientEx)) {
                return null;
            }
            $jt = $fProp($v, 'response_object');
        } catch (ReflectionException $ex) {
            return null;
        }
        return @json_decode($jt, false) ?? null;
    }

    /**
     * @internal
     *
     * @param object $object
     * @param string $name
     * @return \ReflectionProperty
     */
    public static function getReflectionProperty(object $object, string $name): \ReflectionProperty
    {
        $reflectionProperty = (new ReflectionObject($object))->getProperty($name);
        $reflectionProperty->setAccessible(true);
        return $reflectionProperty;
    }

    public static function setReflectionProperty(object $object, string $name, $value): void
    {
        self::getReflectionProperty($object, $name)->setValue($object, $value);
    }

    /**
     * convert an  API URL to a path (of asset to download)
     *
     * @param string|null $serverUrl --- $config['seatable_url']
     * @param ?string $url
     * @return string|null if $url could not be converted to a $path (fall-through/try)
     */
    public static function urlToPath(?string $serverUrl, ?string $url): ?string
    {
        static $supportedSchemes = ['http' => 0, 'https' => 1];

        if (!isset($serverUrl, $url)) {
            return null;
        }

        if (!isset($supportedSchemes[parse_url($serverUrl, PHP_URL_SCHEME)])) {
            return null;
        }

        if (!isset($supportedSchemes[parse_url($url, PHP_URL_SCHEME)])) {
            return null;
        }

        $buffer = $url;
        if (0 !== strpos($buffer, $serverUrl)) {
            return null;
        }

        if (8 !== sscanf($buffer, strtr($serverUrl, ['%' => '%%']) . '/workspace/%d/asset/%n%*8x-%*4x-%*4x-%*4x-%*12x/%s', $workspaceId, $guidBegin, $remainder)) {
            return null;
        }

        $probe = parse_url($remainder);
        if (!isset($probe['path']) || count($probe) !== 1) {
            return null;
        }

        return sprintf("/%s", rawurldecode($remainder));
    }
}
