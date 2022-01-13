<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Project\Meta;

use SeaTable\SeaTableApi\SeaTableApi;

/**
 * Class Util
 */
final class Util
{
    private function __construct()
    {
    }

    /**
     * @param string|\ReflectionMethod $method
     * @return \ReflectionMethod|null
     */
    public static function apiMethodGetDeprecatedByMethod($method): ?\ReflectionMethod
    {
        $docComment = self::apiMethodReflection($method)->getDocComment();
        if (!is_string($docComment)) {
            return null;
        }

        $probe = preg_match('~\s+\* @deprecated since [0-9.]+, use `SeaTableApi::([a-z]+)\(\)`~i', $docComment, $matches);
        if ($probe !== 0 && false !== strpos($docComment, '@deprecated')) {
            return self::apiMethodReflection($matches[1]);
        }

        return null;
    }

    /**
     * @param string|\ReflectionMethod $method
     * @return \ReflectionMethod
     */
    public static function apiMethodReflection($method): \ReflectionMethod
    {
        $reflectionMethod = null;

        if (is_string($method)) {
            $reflectionMethod = new \ReflectionMethod(SeaTableApi::class, $method);
        }

        if ($method instanceof \ReflectionMethod) {
            $reflectionMethod = $method;
        }

        return $reflectionMethod;
    }

    public static function docCommentGetNormalizeLines(string $docComment): array
    {
        $docLines = explode("\n", $docComment);
        if ('/**' !== $firstLine = array_shift($docLines)) {
            throw new \UnexpectedValueException('DocComment first line does not starts with "/**": ' . var_export($firstLine, true));
        }

        $indent = rtrim($lastLine = array_pop($docLines), '/'); // last line is <indent> "/"
        $lastLineChars = count_chars($lastLine, 3);
        if ($lastLineChars !== ' */') {
            throw new \UnexpectedValueException('DocComment last line is not indent (" */") only: ' . var_export($lastLine, true));
        }

        $indentLen = strlen($indent);
        $lines = [];
        foreach ($docLines as $line => $docLine) {
            if (0 !== strpos($docLine, $indent)) {
                throw new \UnexpectedValueException(sprintf('DocComment wrong indent on line %d: %s', $line, var_export($docLine, true)));
            }
            $buffer = substr($docLine, $indentLen);
            if ($buffer !== '' && ' ' !== $buffer[0]) {
                throw new \UnexpectedValueException(sprintf('DocComment wrong indent continuation on line %d: %s', $line, var_export($docLine, true)));
            }
            $buffer === '' || $buffer = substr($buffer, 1);
            $lines[] = $buffer;
        }

        if (empty($lines)) {
            throw new \UnexpectedValueException('DocComment is empty');
        }

        return [$lines, ['indent' => $indentLen]];
    }

    /**
     * @param array|\Iterator|\IteratorAggregate $items
     * @param string $pattern
     * @param bool $includeNonMatching
     * @return \Generator|PregMatchResult[]
     */
    public static function pregMatchEach($items, string $pattern, bool $includeNonMatching = false): \Generator
    {
        $pattern = PregException::testPattern($pattern);
        $found = 0;
        foreach ($items as $offset => $subject) {
            if (!is_string($subject)) {
                $subject = (string) $subject;
            }
            $matches = ($result = preg_match($pattern, $subject, $matches)) ? $matches : null;
            false === $result && PregException::throwInherit('Preg match w/ pattern: ' . $pattern . ' ::');
            if ($result === 0) {
                if (!$includeNonMatching) {
                    continue;
                }
            } else {
                $found++;
            }
            yield $offset => new PregMatchResult($pattern, $subject, $matches, $result);
        }

        /** @noinspection SuspiciousReturnInspection */
        return $found;
    }

    /**
     * var_export like to generate PHP code
     *
     * @param mixed $mixed
     * @return string
     */
    public static function varExport($mixed): string
    {
        if (is_object($mixed)) {
            throw new \UnexpectedValueException('object encountered');
        }

        if (is_resource($mixed)) {
            throw new \UnexpectedValueException('resource encountered');
        }

        if (is_array($mixed)) {
            return json_encode($mixed);
        }

        if (null === $mixed) {
            return 'null';
        }

        return var_export($mixed, true); // string, float & int
    }
}
