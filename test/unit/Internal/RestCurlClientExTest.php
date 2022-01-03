<?php

declare(strict_types=1);


/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Internal;

use SeaTable\SeaTableApi\TestCase;

/**
 * @covers \SeaTable\SeaTableApi\Internal\RestCurlClientEx
 * @covers \SeaTable\SeaTableApi\Internal\RestCurlClientExTest
 */
class RestCurlClientExTest extends TestCase
{
    public function testCreation(): RestCurlClientEx
    {
        $httpOptions = [];
        $client = new RestCurlClientEx($httpOptions);
        $this->addToAssertionCount(1);

        return $client;
    }

    /**
     * @depends testCreation
     * @param RestCurlClientEx $client
     * @return void
     */
    public function testCurlFileHappy(RestCurlClientEx $client)
    {
        $void = $client->curlFile(__FILE__);
        unset($void);
        $this->addToAssertionCount(1);
    }

    /**
     * @depends testCreation
     * @param RestCurlClientEx $client
     * @return void
     */
    public function testCurlFileRealPathFailure(RestCurlClientEx $client)
    {
        $this->expectExceptionMessage('failed to resolve file path: "phar://xyz.phar/foo"');
        $this->expectException(\InvalidArgumentException::class);
        !$client->curlFile('phar://xyz.phar/foo');
    } // @codeCoverageIgnore

    /**
     * @depends testCreation
     * @param RestCurlClientEx $client
     * @return void
     */
    public function testCurlFileUnreadableFile(RestCurlClientEx $client)
    {
        $this->expectExceptionMessage('not a readable file: "."');
        $this->expectException(\InvalidArgumentException::class);
        !$client->curlFile('.');
    } // @codeCoverageIgnore
}
