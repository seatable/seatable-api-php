<?php

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
        $location = '';
        $callPoint = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0] ?? null;
        if ($callPoint && isset($callPoint['file'], $callPoint['line'])) {
            $location = sprintf(' in %s on line %s', $callPoint['file'], $callPoint['line']);
        }

        /**
         * trigger deprecation
         *
         * @deprecated by seatable/seatable-api-php
         */
        trigger_error(
            sprintf(
                'Deprecated use of class %s since 0.1.0%s; use class %s instead',
                __CLASS__,
                $location,
                '\\SeaTable\\SeaTableApi\\SeaTableApi'
            ),
            E_USER_DEPRECATED
        );

        parent::__construct($option);
    }
}
