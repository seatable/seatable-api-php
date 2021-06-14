<?php

declare(strict_types=1);

namespace SeaTable\SeaTableApi;

use PHPUnit\Framework\TestCase;
use SeaTableAPI;

/**
 * Base SeaTableApiTest
 *
 * @covers \SeaTableAPI
 * @covers \SeaTable\SeaTableApi\SeaTableApiTest
 */
class SeaTableApiTest extends TestCase
{
    public function testCreation()
    {
        $this->expectErrorUndefinedArrayKey('url');
        new SeaTableAPI();
    }

    private function expectErrorUndefinedArrayKey(string $actual)
    {
        $this->expectError();
        $this->expectErrorMessageMatches(
            sprintf('~^\QUndefined index: %s\E|\QUndefined array key "%s"\E$~', $actual, $actual)
        );
    }
}
