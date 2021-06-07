<?php

declare(strict_types=1);

namespace SeaTable\SeaTableApi;

use InterNations\Component\HttpMock\MockBuilder;
use SeaTableAPI;

/**
 * HttpMockTest
 *
 * @covers SeaTableAPI
 * @covers \SeaTable\SeaTableApi\SeaTableHttpApiTest
 */
class SeaTableHttpApiTest extends ServerMockTestCase
{
    public function testCreationTriggersAuthTokenRequest()
    {
        $this->mockAuthToken();
        $this->http->setUp();

        new SeaTableAPI($this->getOptions());

        self::assertCount(1, $this->http->requests);
        self::assertSame('POST', $this->http->requests->latest()->getMethod());
        self::assertSame('/api2/auth-token/', $this->http->requests->latest()->getPath());
    }

    /**
     * stub initial auth request
     */
    private function mockAuthToken()
    {
        self::assertSame('1', ini_get('zend.assertions'));
        assert(
            $this->http->mock
                ->when()
                ->methodIs('POST')
                ->pathIs('/api2/auth-token/')
                ->then()
                ->body('{"token": null}')
                ->end() instanceof MockBuilder
        );
    }

    /**
     * @return array minimal options for the http mock
     */
    private function getOptions(): array
    {
        return [
            'url' => $this->getServerUrl(),
            'user' => 'u',
            'password' => 'p',
        ];
    }
}
