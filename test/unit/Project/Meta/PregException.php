<?php declare(strict_types=1);


/*
 * seatable-api-php
 *
 * Date: 05.05.22 16:46
 */

namespace SeaTable\SeaTableApi\Project\Meta;


use SeaTable\SeaTableApi\Exception;

class PregException extends Exception
{
    public static function inherit(string $message = ''): self
    {
        '' === $message || $message .= ' ';
        return new self(sprintf('%s%d %s', $message, preg_last_error(), preg_last_error_msg()));
    }

    /**
     * @param string $message
     * @return void
     * @psalm-return never
     */
    public static function throwInherit(string $message = '')
    {
        throw self::inherit($message);
    }

    public static function testPattern(string $pattern): string
    {
        $result = preg_match($pattern, '');
        false === $result && self::throwInherit('Preg pattern: ' . $pattern);
        return $pattern;
    }

}
