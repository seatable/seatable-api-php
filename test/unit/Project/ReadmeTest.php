<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Project;

use SeaTable\SeaTableApi\Project\Meta\Lines;
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
        $changes = [];

        $path = __DIR__ . '/../../../README.md';
        $segment = (new Lines(file($path)))
            ->segment("### Functions\n", "## Common Mistakes\n", true, false);

        foreach ($segment->match('~^[*] `([a-z]+)[(]([^)]*)[)]`\n$~Di') as $offset => $matches) {
            $line = (string)$matches;

            $reflectionMethod = Meta\Util::apiMethodReflection($matches[1]);
            $deprecatedBy = Meta\Util::apiMethodGetDeprecatedByMethod($reflectionMethod);
            if ($deprecatedBy) {
                $reflectionMethod = $deprecatedBy;
            }

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
                    $buffer .= ' = ' . Meta\Util::varExport($defaultValue);
                }
            }
            $buffer .= ')`' . "\n";
            if ($buffer !== $line) {
                $changes[$offset] = $buffer;
            }
        }

        if (!empty($changes)) {
            $lines = array_replace(file($path), $changes);
            $result = file_put_contents($path, $lines);
            $this->assertNotFalse($result, 'failed writing file: ' . $path);
        }

        $this->assertCount(0, $changes, 'test fails on changes');
    }
}
