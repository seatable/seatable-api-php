<?php

declare(strict_types=1);

namespace SeaTable\SeaTableApi\Internal;

use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class ApiOptionsTest
 *
 * @covers \SeaTable\SeaTableApi\Internal\ApiOptions
 * @covers \SeaTable\SeaTableApi\Internal\ApiOptionsTest
 */
class ApiOptionsTest extends TestCase
{
    public function testCreation()
    {
        $options = new ApiOptions('url', 'user', 'password');
        self::assertInstanceOf(ApiOptions::class, $options);

        $options = new ApiOptions('url', 'user', 'password', ['foo' => 'bar']);
        self::assertInstanceOf(ApiOptions::class, $options);
    }

    public function testCreateFromArrayError()
    {
        $this->expectError();
        $this->expectErrorMessageMatches(
            sprintf('~^\QUndefined index: %s\E|\QUndefined array key "%s"\E$~', $key = 'url', $key)
        );
        ApiOptions::createFromArray([]);
    }

    public function provideOptionArrayFailure(): Generator
    {
        yield 'url empty' => [['url' => '']];

        yield 'minimal' => [$minimal = [
            'url' => 'wrong-url',
            'user' => 'user',
            'password' => 'password',
        ]];

        $minimal_ok = ['url' => 'https://api.example.net'] + $minimal;

        yield 'optional port' => [$minimal_ok + [
                'port' => '8080',
        ]];

        yield 'optional http_options' => [$minimal_ok + [
            'http_options' => (object)['foo' => 'bar'],
        ]];

        $minimal_pass_missing = ['password' => null] + $minimal_ok;
        yield 'password missing' => [$minimal_pass_missing];
    }

    /**
     * @dataProvider provideOptionArrayFailure
     *
     * @param array $options
     * @return void
     */
    public function testCreateFromArrayFailure(array $options)
    {
        $this->expectException(ApiOptionsException::class);
        ApiOptions::createFromArray($options);
    }

    public function provideOptionArrayHappy(): Generator
    {
        yield 'minimal' => [$minimal = [
            'url' => 'https://api.example.net',
            'user' => 'user',
            'password' => 'password',
        ]];

        yield 'optional port' => [$minimal + [
            'port' => 8080,
        ]];

        yield 'optional http_options' => [$minimal + [
            'http_options' => ['foo' => 'bar'],
        ]];
    }

    /**
     * @dataProvider provideOptionArrayHappy
     *
     * @param array $options
     * @return void
     */
    public function testCreateFromArrayHappy(array $options)
    {
        ApiOptions::createFromArray($options);
        $this->addToAssertionCount(1);
    }

    public function testHttpOptions()
    {
        $minimal = [
            'url' => 'https://api.example.net',
            'user' => 'user',
            'password' => 'password',
        ];
        $options = ApiOptions::createFromArray($minimal);
        self::assertEmpty($options->getHttpOptions(), 'no http_options result in empty array');

        $options = ApiOptions::createFromArray($minimal + ['http_options' => []]);
        self::assertEmpty($options->getHttpOptions(), 'empty array http_options result in empty array');
    }

    public function testMainOptions()
    {
        $minimal = [
            'url' => 'https://api.example.net',
            'user' => 'user',
            'password' => 'password',
        ];
        $options = ApiOptions::createFromArray($minimal);
        self::assertSame($minimal['url'], $options->getUrl());
        self::assertSame($minimal['user'], $options->getUser());
        self::assertSame($minimal['password'], $options->getPassword());
    }
}
