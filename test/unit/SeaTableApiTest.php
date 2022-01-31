<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi;

use SeaTable\SeaTableApi\Compat\Deprecation\PhpTest;
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
        $this->expectNoticeMessageMatches(
            sprintf('~^\QUndefined index: %1$s\E|\QUndefined array key "%1$s"\E$~', 'url')
        );
        $this->expectNotice();
        new SeaTableApi();
    } // @codeCoverageIgnore

    /**
     * @return void
     * @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php
     */
    public function testBackwardsCreation()
    {
        $this->expectDeprecationMessageMatches(
            '(^Since seatable/seatable-api-php 0\.1\.0: Class SeaTableAPI is deprecated' .
            ', use \Q\SeaTable\SeaTableApi\SeaTableApi\E instead as' .
            ' seatable/seatable-api-php version (?:' . PhpTest::REGEX_PKG_VERSION . ') is already in use\.' .
            ' In .*/test/unit/SeaTableApiTest\.php on line ' . (__LINE__ + 4) .
            '$)'
        );
        $this->expectDeprecation();
        new SeaTableApiDeprecated(); // @codeCoverageIgnoreStart
    } // @codeCoverageIgnoreEnd

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
