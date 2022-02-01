<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\SeaTableApi;

use SeaTable\SeaTableApi\SeaTableApi;
use SebastianBergmann\CodeCoverage\Util\DirectoryCouldNotBeCreatedException;

final class DocCommentSpy
{
    /**
     * @var array|string[]|null
     */
    private $normalizedLines;

    /**
     * @var ?string PCRE pattern
     */
    private $pattern;

    /**
     * @var \ReflectionMethod
     */
    private $reflectionMethod;

    public const defaultClassName = SeaTableApi::class;

    public static function from($method): DocCommentSpy
    {
        if (is_string($method)) {
            return self::createFromMethodName($method);
        }

        return self::createFromReflectionMethod($method);
    }

    public static function createFromMethodName(string $methodName, string $className = null): DocCommentSpy
    {
        null === $className && $className = self::defaultClassName;

        return self::createFromReflectionMethod(new \ReflectionMethod($className, $methodName));
    }

    public static function createFromReflectionMethod(\ReflectionMethod $reflectionMethod): DocCommentSpy
    {
        return new self($reflectionMethod);
    }

    private function __construct(\ReflectionMethod $reflectionMethod)
    {
        $this->reflectionMethod = $reflectionMethod;
    }

    public function getDocComment(): ?string
    {
        $docComment = $this->reflectionMethod->getDocComment();

        return is_string($docComment) ? $docComment : null;
    }

    public function getDocCommentNormalizedLines(): array
    {
        $docComment = $this->getDocComment();

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

        $this->normalizedLines = $lines;

        return $lines;
    }

    public function matches($pattern = null): bool
    {
        return $this->grep($pattern)->has();
    }

    public function grep($pattern = null): PregGrepResult
    {
        if ($pattern instanceof PregPattern) {
            $pattern = (string)$pattern;
        }

        return PregGrepResult::grep(
            $this->filterPattern($pattern),
            $this->normalizedLines ?? $this->getDocCommentNormalizedLines()
        );
    }

    public function grepPattern(string $pattern = null): PregGrepResult
    {
        return PregGrepResult::grep(
            $this->filterPattern($pattern),
            $this->normalizedLines ?? $this->getDocCommentNormalizedLines()
        );
    }

    /**
     * the title is the first line of a doc-comment
     *
     * @return string
     */
    public function getTitle(): string
    {
        $lines = $this->normalizedLines ?? $this->getDocCommentNormalizedLines();
        return $lines[0];
    }

    public function titleContains(string $needle): bool
    {
        return false !== strpos($this->getTitle(), $needle);
    }

    private function filterPattern(?string $pattern): string
    {
        if (null !== $pattern) {
            return $this->pattern = $pattern;
        }

        if (null === $this->pattern) {
            throw new \BadMethodCallException('pattern is required');
        }

        return $this->pattern;
    }

    /**
     * @return \ReflectionMethod
     */
    public function getReflectionMethod(): \ReflectionMethod
    {
        return $this->reflectionMethod;
    }

    /**
     * @return string name of the method (without class name and namespace)
     */
    public function getMethodName(): string
    {
        return $this->reflectionMethod->getName();
    }
}
