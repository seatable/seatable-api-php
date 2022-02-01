<?php declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\SeaTableApi;

final class PregPattern
{
    /**
     * @var string
     */
    private $pattern;

    public static function fromString(string $pattern): PregPattern
    {
        return new self($pattern);
    }

    private function __construct(string $pattern)
    {
        $this->pattern = $pattern;
    }

    public function matchesString(string $subject): bool
    {
        $result = preg_match($this->pattern, $subject);
        if (false === $result) {
            throw new \UnexpectedValueException(sprintf('Match error with pattern %s on subject: %s', var_export($this->pattern, true), var_export($subject, true)));
        }

        return (bool) $result;
    }

    public function __toString(): string
    {
        return $this->pattern;
    }
}
