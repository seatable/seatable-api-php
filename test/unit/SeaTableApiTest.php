<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi;

use SeaTable\SeaTableApi\Compat\Deprecation\PhpTest;
/**
 * Base SeaTableApiTest
 *
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
        $this->expectNoticeMessageMatches(
            sprintf('~^\QUndefined index: %1$s\E|\QUndefined array key "%1$s"\E$~', 'url')
        );
        $this->expectNotice();
        new SeaTableApi();
    } // @codeCoverageIgnore

    /**
     * @codeCoverageIgnore
     * @return array[]
     */
    public function provideOptionUrls(): array
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
    } // @codeCoverageIgnore
}
