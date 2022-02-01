<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\SeaTableApi;

final class PregGrepResult implements \Countable
{
    /**
     * @var array
     */
    private $array;

    /**
     * @var int
     */
    private $flags;

    /**
     * @var string
     */
    private $pattern;

    /**
     * @var array|null
     */
    private $result;

    public static function grep(string $pattern, array $array, int $flags = 0): PregGrepResult
    {
        $result = new PregGrepResult($pattern, $array, $flags);
        $result->_grep();

        return $result;
    }

    private function __construct(string $pattern, array $array, int $flags = 0)
    {
        $this->pattern = $pattern;
        $this->array = $array;
        $this->flags = $flags;
    }

    public function getPattern(): string
    {
        return $this->pattern;
    }

    public function getArray(): array
    {
        return $this->array;
    }

    public function getFlags(): int
    {
        return $this->flags;
    }

    public function getResult(): array
    {
        return $this->result;
    }

    /**
     * get matches at index
     *
     * re-matches the grep preg pattern on grep result line by the line's index, zero based.
     *
     * @param int $index
     * @param int|string $group
     * @return array|string typically array and string with $group
     */
    public function getMatchesAt(int $index, $group = null)
    {
        $resultIndex = array_keys($this->result)[$index];

        $result = preg_match($this->pattern, $this->result[$resultIndex], $matches);
        if (false === $result) {
            throw new \UnexpectedValueException(sprintf('Match error on index #%d (line #%d): %s', $index, $resultIndex, var_export($this->result[$index], true)));
        }

        if ($group !== null) {
            if (!array_key_exists($group, $matches)) {
                throw new \UnexpectedValueException(sprintf('Key %s not in match keys: %s', var_export($group, true), var_export($matchesm, true)));
            }
            return $matches[$group];
        }

        return $matches;
    }

    private function _grep(): void
    {
        $result = preg_grep($this->pattern, $this->array, $this->flags);
        if (false === $result) {
            throw new \UnexpectedValueException('Error grepping pattern: ' . var_export($this->pattern, true));
        }

        $this->result = $result;
    }

    public function has(): bool
    {
        return 0 !== count($this->result);
    }

    public function count(): int
    {
        return count($this->result);
    }
}
