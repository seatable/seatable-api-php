<?php

declare(strict_types=1);

namespace SeaTable\SeaTableApi;

use PHPUnit\Framework\TestCase;
use SeaTableAPI;

/**
 * Base SeaTableApiTest
 *
 * @covers \SeaTableAPI
 * @covers \SeaTable\SeaTableApi\SeaTableApi
 * @covers \SeaTable\SeaTableApi\SeaTableApiTest
 */
class SeaTableApiTest extends TestCase
{
    public function testCreation()
    {
        $this->expectErrorUndefinedArrayKey('url');
        new \SeaTable\SeaTableApi\SeaTableApi();
    }

    public function testBackwardsCreation()
    {
        $this->expectErrorUndefinedArrayKey('url');
        new SeaTableAPI();
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
     */
    public function testUrlOption(string $url, bool $pass)
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage($pass ? "SeaTable user is missing or has a bad format" : "SeaTable URL is missing or bad URL format");
        new SeaTableAPI(['url' => $url]);
    }

    private function expectErrorUndefinedArrayKey(string $actual)
    {
        $this->expectError();
        $this->expectErrorMessageMatches(
            sprintf('~^\QUndefined index: %s\E|\QUndefined array key "%s"\E$~', $actual, $actual)
        );
    }
}
