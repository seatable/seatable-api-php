<?php

declare(strict_types=1);


/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Internal;

use Ktomk\Pbuild\Build\Lib\Error\PErr;
use SeaTable\SeaTableApi\TestCase;

/**
 * @covers \SeaTable\SeaTableApi\Internal\CurlHttpOptions
 * @covers \SeaTable\SeaTableApi\Internal\CurlHttpOptionsTest
 */
class CurlHttpOptionsTest extends TestCase
{
    public function testCreation(): void
    {
        $subject = new CurlHttpOptions([CURLOPT_TIMEOUT_MS => 500]);
        $this->assertNotNull($subject);
        $this->assertSame(500, $subject[CURLOPT_TIMEOUT_MS]);
    }

    public function testSetAndUnset(): void
    {
        $subject = new CurlHttpOptions([CURLOPT_TIMEOUT_MS => 500]);
        $subject[CURLOPT_TIMEOUT_MS] = 1000;
        $this->assertSame(1000, $subject[CURLOPT_TIMEOUT_MS]);
        error_reporting(
            ($level = error_reporting()) & ~28170 /* PErr::E_MASK_RT_NON_FATAL */
        );
        unset($subject[CURLOPT_TIMEOUT_MS]);
        error_reporting($level);
        $this->assertFalse(isset($subject[CURLOPT_TIMEOUT_MS]));
    }

    public function testGetArrayCopy(): void
    {
        $subject = new CurlHttpOptions([]);
        $expected = [
            CURLOPT_RETURNTRANSFER /* 19913 */ => true,
            CURLOPT_FOLLOWLOCATION /* 52 */ => false,
        ];
        $this->assertSame($expected, $subject->getArrayCopy());
    }
}
