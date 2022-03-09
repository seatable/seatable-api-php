<?php declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Project;

use SeaTable\SeaTableApi\SeaTableApi;
use SeaTable\SeaTableApi\TestCase;

/**
 * Class ReadmeTest
 *
 * @coversNothing
 */
class ReadmeTest extends TestCase
{
    public function testFunctions()
    {
        $changes = 0;
        $path = __DIR__ . '/../../../README.md';

        $lines = file($path, FILE_IGNORE_NEW_LINES);
        $start = array_search('### Functions', $lines, true);
        $this->assertIsInt($start);
        $segment = array_slice($lines, $start);
        $end = array_search('## Common Mistakes', $segment, true);
        $this->assertIsInt($end);
        $segment = array_slice($segment, 0, $end, false);
        foreach ($segment as $offset => $line) {
            if ('' === $line || '*' !== $line[0]) {
                continue;
            }
            $matches = preg_match('~^[*] `([a-z]+)[(]([^)]*)[)]`$~Di', $line, $matches) ? $matches : null;
            $this->assertNotNull($matches, $start + $offset . ': ' . $line);
            $reflectionMethod = new \ReflectionMethod(SeaTableApi::class, $matches[1]);
            $buffer = '* `' . $reflectionMethod->getName() . '(';
            foreach ($reflectionMethod->getParameters() as $index => $reflectionParameter) {
                $index && $buffer .= ', ';
                $reflectionType = $reflectionParameter->getType();
                if (null !== $reflectionType) {
                    if (!method_exists($reflectionType, 'getName')) {
                        $this->fail('code is incompatible with the target PHP version');
                    }
                    /** @noinspection PhpElementIsNotAvailableInCurrentPhpVersionInspection */
                    $buffer .= $reflectionType->getName() . ' ';
                }
                $buffer .= '$' . $reflectionParameter->getName();
                if ($reflectionParameter->isOptional()) {
                    $this->assertTrue($reflectionParameter->isDefaultValueAvailable());
                    $this->assertFalse($reflectionParameter->isDefaultValueConstant());
                    $defaultValue = $reflectionParameter->getDefaultValue();
                    $buffer .= ' = ' . $this->varExport($defaultValue);
                }
            }
            $buffer .= ')`';
            if ($buffer !== $line) {
                $fileBuffer = file_get_contents($path);
                $this->assertIsString($fileBuffer);
                $fileBuffer = str_replace($line, $buffer, $fileBuffer, $count);
                $this->assertSame(1, $count);
                $result = file_put_contents($path, $fileBuffer);
                $this->assertNotFalse($result);
                $this->assertSame(strlen($fileBuffer), $result);
                $changes++;
            }
        }
        $this->assertSame(0, $changes, 'test fails on changes');
    }

    private function varExport($mixed): string
    {
        if (is_object($mixed)) {
            $this->fail('object encountered');
        }

        if (is_array($mixed)) {
            return json_encode($mixed);
        }

        return var_export($mixed, true);
    }
}
