<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Compat\Deprecation;

use SeaTable\SeaTableApi\Exception;

/**
 * PHP Deprecation Utility
 *
 * @internal
 */
final class Php
{
    /**
     * get call site stack frame
     *
     * enriched for deprecations:
     *
     *  - location: string space prefixed php-style " in <file> on line <line>"
     *
     * @param int $at
     * @return null|array{file: string, line: int, location: string}
     */
    public static function callSite(int $at = 0)
    {
        assert($at >= -1);

        $stack = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, $at + 3);

        if (!isset($stack[$at + 1])) {
            throw new \OutOfBoundsException(sprintf('no call site at %d', $at));
        }

        $stackFrame = $stack[$at + 1];
        if (!isset($stackFrame['file'], $stackFrame['line'])) {
            throw new \UnexpectedValueException('internal stack frame error on file, line');
        }

        $stackFrame['location'] = sprintf(' in %s on line %s', $stackFrame['file'], $stackFrame['line']);
        $stackFrame['parent'] = $stack[$at + 2] ?? null;

        return $stackFrame;
    }

    /**
     * @var int test-point
     */
    private static $PHP_VERSION_ID = PHP_VERSION_ID;

    /**
     * check php version and if not within (hard-encoded) configuration trigger a deprecation warning
     *
     * @throws Exception if below the current minimum required php version.
     *
     * @return void
     */
    public static function versionCheck()
    {
        if (self::$PHP_VERSION_ID < 70400) {
            $versionSuggest = '7.4.0';
            $versionInUse = sprintf('%d.%d.%d', PHP_MAJOR_VERSION, PHP_MINOR_VERSION, PHP_RELEASE_VERSION);
            trigger_error(
                sprintf(
                    'Using the SeaTableApi with this PHP version %s is deprecated since 0.1.8 and it will stop working in the future. Use PHP version %s or later instead.',
                    $versionInUse,
                    $versionSuggest
                ),
                E_USER_DEPRECATED
            );

            if (self::$PHP_VERSION_ID < 70000) {
                throw new Exception(sprintf('SeaTableApi does not work with this PHP version %s', $versionInUse));
            }
        }
    }

    /**
     * get package version
     *
     * conditionally looking into composers meta-data.
     *
     * @param string $package e.g. "seatable/seatable-api-php"
     *
     * @return ?string package pretty version (e.g. "dev-main", "1.0.0+no-version-set"), null for no version
     *
     * @throws \OutOfBoundsException if composer does not find the package
     */
    public static function pkgVersion(string $package)
    {
        $version = '';
        $versionClass = \Composer\InstalledVersions::class;
        $versionMethod = 'getPrettyVersion';
        if (class_exists($versionClass) && method_exists($versionClass, $versionMethod)) {
            $version = $versionClass::$versionMethod($package);
        }

        return $version;
    }
}
