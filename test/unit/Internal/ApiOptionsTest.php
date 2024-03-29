<?php

declare(strict_types=1);

namespace SeaTable\SeaTableApi\Internal;

use Generator;
use SeaTable\SeaTableApi\TestCase;

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
        $connectOptions = new ConnectOptions();
        $connectOptions->url = 'url';
        $connectOptions->user = 'user';
        $connectOptions->password = 'password';
        $options = new ApiOptions($connectOptions);
        self::assertInstanceOf(ApiOptions::class, $options);

        $connectOptions->curlHttpOptions =  ['foo' => 'bar'];
        $options = new ApiOptions($connectOptions);
        self::assertInstanceOf(ApiOptions::class, $options);
    }

    /**
     * @return Generator
     * @codeCoverageIgnore
     */
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
                'port' => 8080,
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
    } // @codeCoverageIgnore

    /**
     * @return Generator
     * @codeCoverageIgnore
     */
    public function provideOptionArrayHappy(): Generator
    {
        yield 'minimal' => [$minimal = [
            'url' => 'https://api.example.net',
            'user' => 'user',
            'password' => 'password',
        ]];

        yield 'optional user (new)' => [$minimal + [
            'user' => null,
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
