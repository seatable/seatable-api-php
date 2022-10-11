<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Internal;

use SeaTable\SeaTableApi\SeaTableApi;
use SeaTable\SeaTableApi\TestCase;

/**
 * Utility Method Test (internal implementations)
 *
 * @covers \SeaTable\SeaTableApi\Internal\Util
 * @uses \SeaTable\SeaTableApi\Internal\UtilTest
 */
class UtilTest extends TestCase
{
    private $fixtureServerUrl = 'https://seatable.example.org';

    public function provideUrlToPath(): array
    {
        return [
            'null' => [null, null],
            'empty' => ['', null],
            'NUL' => ["\0", null],
            'url (out)' => ['https://example.org', null],
            'url (example image asset)' => [
                'https://seatable.example.org/workspace/42/asset/f98d3c3d-488e-44e8-84ff-4779d9150da1/images/2022-01/example.jpeg',
                '/images/2022-01/example.jpeg',
                ],
            'url (data-uri)' => [
                'data:image/image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAb1BMVEVHcEz/fAH/ggD/gAD/gAD/fwH/gAD/ggD/fwD7bRL2VRr4XhX0TR/zRCXwNi3/fwD/gAD/fgH7bQv/gQD/gAD/jgD/ggD/gADuMTH8bwv/gAD0SyL3XRXuMjD/gAD+dwX8bwr6ZhD/fgHwOSztLDQQpH7aAAAAHnRSTlMA4THO7SPTFuIS/v7+/vW92LD3IHEJM+7OXo3NvsbvtfwFAAAAx0lEQVQ4y5XR2RKDIAxAUXDFhaJWuxe1+v/fWMeNJBVmmtdzoSUyhsdTCXONF2g/cbt2FbM7itWtxe6WAvhhcblqOKXzvNZF/KeT+/mb/IUYn+en8YaLB/VxwEWBfRgGKZ+wCLBLmedp+gKBD3zRLOv7uwlq45t2XQt21WxX8F3bj47gO6PZhdFpFKMFr4xOUzNSiAqo1lFDtqkqoNPPncnnCDlapwipC7czhZ3evz/Udh4Xhw4Ki5t12nwtHL6s0+VTUf687wtKAyvb/3Kr0gAAAABJRU5ErkJggg',
                null,
            ],
            'url (example image broken asset URL)' => [
                'https://seatable.example.org/workspace/3/asset/a9d02ac9-1dfb-4692-8867-78776e0ff081/images/encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0b-uC8fZHIp9YDY1HqgzLR1cXlkIy7u0XtA&usqp=CAU',
                null,
            ],
        ];
    }

    /**
     * @dataProvider provideUrlToPath
     * @param string|null $url
     * @param string|null $expected
     * @return void
     */
    public function testUrlToPath(?string $url, ?string $expected): void
    {
        $actual = Util::urlToPath($this->fixtureServerUrl, $url);
        $this->assertSame($expected, $actual, "\$url: $url -> \$path: $actual");
    }

    /**
     * @return void
     */
    public function testTryBaseAuthDtableName(): void
    {
        $this->assertNull(Util::tryBaseAuthDtableName(
            (new \ReflectionClass(SeaTableApi::class))
                ->newInstanceWithoutConstructor()
        ));
    }

    /**
     * @return void
     */
    public function testTryBaseAuth(): void
    {
        $this->assertNull(Util::tryBaseAuth(
            (new \ReflectionClass(SeaTableApi::class))
                ->newInstanceWithoutConstructor()
        ));
    }

    /**
     * @uses \SeaTable\SeaTableApi\Internal\CurlHttpOptions::__construct
     * @uses \SeaTable\SeaTableApi\Internal\RestCurlClientEx::__construct
     *
     * @return void
     */
    public function testTryBaseAuthProvides(): void
    {
        $api = (new \ReflectionClass(SeaTableApi::class))
            ->newInstanceWithoutConstructor();

        $restCurlClientEx = new RestCurlClientEx([]);
        Util::setReflectionProperty($api, 'restCurlClientEx', $restCurlClientEx);

        $expected = (object) ['dtable_name' => 'foo'];
        Util::setReflectionProperty($restCurlClientEx, 'response_object', json_encode($expected));

        $this->assertEquals($expected, Util::tryBaseAuth($api));
    }


    public function provideQuoteSqlTableNames(): array
    {
        return [
            ['', '``'],
            ['*', '`*`'],
            ["\xf0\x9f\x8e\xa5 Camera Equipment", "`\xf0\x9f\x8e\xa5 Camera Equipment`"],
            ['backtick: ` ', null],
        ];
    }

    /**
     * @dataProvider provideQuoteSqlTableNames
     * @return void
     */
    public function testQuoteSqlTableName(string $tableName, ?string $expected): void
    {
        try {
            $actual = Util::quoteSqlTableName($tableName);
        } catch (\InvalidArgumentException $exception) {
            $actual = null;
            $this->assertNull($expected);
        }
        $this->assertSame($expected, $actual);
    }
}
