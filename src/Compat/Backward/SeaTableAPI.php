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
        $location = Php::callSite();

        /**
         * trigger deprecation
         *
         * @deprecated by seatable/seatable-api-php
         */
        Php::triggerDeprecation(
            '0.1.0',
            'Class %s is deprecated, use \\%s instead%s. In %s on line %d',
            __CLASS__,
            parent::class,
            $versionReason,
            $location['file'],
            $location['line']
        );

        parent::__construct($option);
    }
}
