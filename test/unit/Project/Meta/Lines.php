<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Project\Meta;

/**
 * Class Lines
 */
class Lines implements \Countable, \IteratorAggregate
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var array
     */
    private $lines;

    public function __construct(array $lines, array $data = [])
    {
        $this->lines = $lines;
        $this->data = $data;
    }

    public function data(string $name = null, $default = null)
    {
        if (null === $name) {
            return $this->data;
        }

        return $this->data[$name] ?? $default;
    }

    public function count()
    {
        return count($this->lines);
    }

    public function slice(int $start, int $end, array $data): self
    {
        $length = max(0, $end - $start);
        $data += ['start' => $start, 'end' => $end, 'length' => $length] + $this->data;

        return new self($length ? array_slice($this->lines, $start, $length) : [], $data + $this->data);
    }

    /**
     * @param string $line
     * @param int|null $offset
     * @return int|null
     */
    public function indexOf(string $line, int $offset = null)
    {
        $lines = $this->lines;
        if (null !== $offset) {
            $lines = array_slice($lines, $offset, null, true);
        }

        $key = array_search($line, $lines, true);
        return is_int($key) ? array_flip(array_keys($lines))[$key] + $offset : null;
    }

    public function segment(string $from = null, string $unless = null, bool $preserveKeys = true, bool $allowEmpty = true): self
    {
        $length = null;
        $segment = [];

        $start = null === $from ? 0 : $this->indexOf($from);
        $end = null === $unless ? count($this->lines) : $this->indexOf($unless, $start);
        if (isset($start, $end)) {
            $length = $end - $start;
            $segment = array_slice($this->lines, $start, $length, $preserveKeys);
        } elseif (!$allowEmpty) {
            throw new \RangeException('Empty segment not allowed ($allowEmpty)');
        }

        $data = ['start' => $start, 'end' => $end, 'length' => $length];
        return new self($segment, $data + $this->data);
    }

    public function toArray(bool $preserveKeys = true): array
    {
        return $preserveKeys ? $this->lines : array_values($this->lines);
    }

    public function getIterator(): \Generator
    {
        yield from $this->lines;
    }

    public function assertNotEmpty(callable $callable = null): self
    {
        if (0 === count($this->lines)) {
            $message = 'Failed asserting lines are not empty';
            if ($callable) {
                $callable($this, $message);
            }
            throw new \AssertionError($message);
        }

        return $this;
    }

    public function grep(string $pattern, bool $invert = false): self
    {
        $flags = 0;
        $invert && $flags = PREG_GREP_INVERT;
        $result = preg_grep($pattern, $this->lines, $flags);
        false === $result && PregException::throwInherit('Grep failure:');
        return new self($result, ['grep_pattern' => $pattern] + $this->data);
    }

    /**
     * @param string $pattern
     * @param int $count
     * @return PregMatchResult[]|\Generator
     */
    public function match(string $pattern, int &$count = null): \Generator
    {
        $generator = Util::pregMatchEach($this->lines, $pattern);
        yield from $generator;
        /** @noinspection SuspiciousReturnInspection */
        return $count = $generator->getReturn();
    }

    public function key(int $index)
    {
        return array_keys($this->lines)[$index] ?? null;
    }

    public function line(int $offset)
    {
        return $this->lines[$offset] ?? null;
    }
}
