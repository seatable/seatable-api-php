<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi;

use SeaTableAPI as SeaTableApiDeprecated;

/**
 * Base SeaTableApiTest
 *
 * @covers \SeaTableAPI
 * @covers \SeaTable\SeaTableApi\SeaTableApi
 * @covers \SeaTable\SeaTableApi\SeaTableApiTest
 */
class SeaTableApiTest extends TestCase
{
    /**
     * @uses \SeaTable\SeaTableApi\Internal\ApiOptions::createFromArray
     */
    public function testCreation()
    {
        $this->expectErrorUndefinedArrayKey('url');
        new SeaTableApi();
    }

    public function testBackwardsCreation()
    {
        $this->expectError();
        $this->expectErrorMessageMatches('(Deprecated use of class SeaTableAPI since 0\.1\.0 in .*api-php version (?:dev-main|1\.0\.0\+no-version-set) is already in use\.$)');
        new SeaTableApiDeprecated();
    }

    public function provideOptionUrls()
    {
        return [
            ['file:///path/to/some/file', false],
            ['https://example.org', true],
        ];
    }

    /**
     * @dataProvider provideOptionUrls
     * @uses \SeaTable\SeaTableApi\Internal\ApiOptions::createFromArray
     */
    public function testUrlOption(string $url, bool $pass)
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage($pass ? "SeaTable user is missing or has a bad format" : "SeaTable URL is missing or bad URL format");
        new SeaTableApi(['url' => $url]);
    }

    private function expectErrorUndefinedArrayKey(string $actual)
    {
        $this->expectError();
        $this->expectErrorMessageMatches(
            sprintf('~^\QUndefined index: %s\E|\QUndefined array key "%s"\E$~', $actual, $actual)
        );
    }
}
