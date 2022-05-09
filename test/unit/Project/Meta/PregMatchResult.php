<?php declare(strict_types=1);


/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Project\Meta;

/**
 * Class PregMatchResult
 *
 * @property string subject readonly
 */
class PregMatchResult implements \ArrayAccess
{
    /**
     * @var array|null
     */
    private $matches;

    /**
     * @var string
     */
    private $pattern;

    /**
     * @var int
     */
    private $result;

    /**
     * @var string
     */
    private $subject;

    public function __construct(string $pattern, string $subject, array $matches = null, $result)
    {
        if (!is_int($result)) {
            throw new PregException('PregMatch failure result: ', var_export($result, true));
        }

        $this->pattern = $pattern;
        $this->subject = $subject;
        $this->matches = $matches;
        $this->result = $result;
    }

    /**
     * @return string
     */
    public function getPattern(): string
    {
        return $this->pattern;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getMatches()
    {
        return $this->matches;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->matches[$offset]);
    }

    public function offsetGet($offset)
    {
        $result = $this->matches[$offset] ?? null;
        if (null === $result) {
            return null;
        }

        if (!is_string($result)) {
            throw new PregException('Incompatible match: ' . json_encode($result));
        }

        return $result;
    }

    public function offsetSet($offset, $value)
    {
        throw new PregException('modification of match offset ' . $offset . ' not allowed');
    }

    public function offsetUnset($offset)
    {
        throw new PregException('deletion of match offset ' . $offset . ' not allowed');
    }

    /**
     * @return int number of matches (0 or 1)
     */
    public function getResult(): int
    {
        return $this->result;
    }

    public function __toString()
    {
        return $this->subject;
    }

    public function __isset($name)
    {
        return false;
    }

    public function __set($name, $value)
    {
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
