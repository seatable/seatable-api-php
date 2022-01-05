<?php

/*
 * seatable-api-php
 */

use SeaTable\SeaTableApi\Compat\Deprecation\Php;

/**
 * SeaTable API - PHP class wrapper
 *
 * Backwards compatible single-class autoload for the (now deprecated) class named "SeaTableAPI".
 *
 * @deprecated since 0.1.0; use \SeaTable\SeaTableApi\SeaTableApi instead.
 *
 * @see \SeaTable\SeaTableApi\SeaTableApi
 * @noinspection PhpIllegalPsrClassPathInspection
 */
class SeaTableAPI extends \SeaTable\SeaTableApi\SeaTableApi
{
    public function __construct($option = [])
    {
        $versionPkg = 'seatable/seatable-api-php';
        $versionReason = sprintf(' as %s version %s is already in use', $versionPkg, Php::pkgVersion($versionPkg) ?? '<unknown package>');

        /**
         * trigger deprecation
         *
         * @deprecated by seatable/seatable-api-php
         */
        trigger_error(
            sprintf(
                'Deprecated use of class %s since 0.1.0%s; use class \\%s instead%s.',
                __CLASS__,
                Php::callSite()['location'],
                parent::class,
                $versionReason
            ),
            E_USER_DEPRECATED
        );

        parent::__construct($option);
    }
}
