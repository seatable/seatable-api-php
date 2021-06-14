<?php

declare(strict_types=1);

namespace SeaTable\SeaTableApi;

use PHPUnit\Framework\TestCase;

use InterNations\Component\HttpMock\PHPUnit\HttpMockTrait;

/**
 * HttpMockTestCase
 *
 * Binding to internations/http-mock for Phpunit tests
 *
 * @covers \SeaTable\SeaTableApi\ServerMockTestCase
 */
abstract class ServerMockTestCase extends TestCase
{
    use HttpMockTrait;

    protected static $httpPort = 8082;
    protected static $httpHost = 'localhost';

    /**
     * @return string configured test-server URL
     */
    protected function getServerUrl(): string
    {
        return sprintf('http://%s:%s', self::$httpHost, self::$httpPort);
    }

    public static function setUpBeforeClass(): void
    {
        static::setUpHttpMockBeforeClass(self::$httpPort, self::$httpHost);
    }

    public static function tearDownAfterClass(): void
    {
        static::tearDownHttpMockAfterClass();
    }

    public function setUp(): void
    {
        $this->setUpHttpMock();
    }

    public function tearDown(): void
    {
        $this->tearDownHttpMock();
    }
}
