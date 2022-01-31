<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi;

use InterNations\Component\HttpMock\MockBuilder;
use SeaTable\SeaTableApi\Internal\RestCurlClientEx;

/**
 * HttpMockTest
 *
 * @covers \SeaTableAPI
 * @covers \SeaTable\SeaTableApi\SeaTableApi
 * @covers \SeaTable\SeaTableApi\Internal\RestCurlClientEx
 * @covers \SeaTable\SeaTableApi\SeaTableHttpApiTest
 * @covers \SeaTable\SeaTableApi\ServerMockTestCase
 * @uses \SeaTable\SeaTableApi\Internal\ApiOptions
 */
class SeaTableHttpApiTest extends ServerMockTestCase
{
    public function testCreationTriggersAuthTokenRequest()
    {
        $this->mockAuthToken();
        $this->http->setUp();

        new SeaTableApi($this->getOptions());

        self::assertCount(1, $this->http->requests);
        self::assertSame('POST', $this->http->requests->latest()->getMethod());
        self::assertSame('/api2/auth-token/', $this->http->requests->latest()->getPath());
    }

    /**
     * test for default return type and the check account info method
     */
    public function testResponseIsObject()
    {
        $this->mockAuthToken();
        $this->mockAccountInfo();
        $this->http->setUp();

        $actual = (new SeaTableApi($this->getOptions()))->checkAccountInfo();

        self::assertIsObject($actual);
    }

    /**
     * test for $response_object_to_array backwards compat behaviour
     *
     * @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite
     * @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php::triggerDeprecation
     */
    public function testResponseAsArrayIsDeprecated()
    {
        $this->mockAuthToken();
        $this->http->setUp();

        $api = new SeaTableApi($this->getOptions());

        $this->expectDeprecationMessage(
            sprintf(
                'Since seatable/seatable-api-php 0.1.4: SeaTableApi->response_object_to_array = true is deprecated and will be removed in a future version. In %s on line %s',
                __FILE__,
                __LINE__ + 4
            )
        );
        $this->expectDeprecation();
        $api->response_object_to_array = true;
    } // @codeCoverageIgnore

    /**
     * test for $response_object_to_array backwards compat behaviour
     *
     * @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite
     * @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php::triggerDeprecation
     */
    public function testResponseAsArrayIsDeprecatedForReading()
    {
        $this->mockAuthToken();
        $this->http->setUp();

        $api = new SeaTableApi($this->getOptions());

        $this->expectDeprecationMessage(
            sprintf(
                'Since seatable/seatable-api-php 0.1.4: Reading of SeaTableApi->response_object_to_array is deprecated and will be removed in a future version. In %s on line %s',
                __FILE__,
                __LINE__ + 4
            )
        );
        $this->expectDeprecation();
        $this->assertFalse($api->response_object_to_array);
    } // @codeCoverageIgnore

    /**
     * test for $response_object_to_array backwards compat behaviour
     *
     * @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite
     * @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php::triggerDeprecation
     */
    public function testDeprecatedResponseAsArrayCanStillBeSetToTrue()
    {
        $this->mockAuthToken();
        $this->mockAccountInfo();
        $this->http->setUp();

        $api = new SeaTableApi($this->getOptions());

        @$api->response_object_to_array = true;
        $result = @$api->checkAccountInfo();
        $this->assertIsArray($result);
    }

    /**
     * test for $response_object_to_array backwards compat behaviour
     *
     * @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite
     * @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php::triggerDeprecation
     */
    public function testDeprecatedResponseAsArrayCanStillBeRead()
    {
        $this->mockAuthToken();
        $this->http->setUp();

        $api = new SeaTableApi($this->getOptions());

        $this->assertFalse(@$api->response_object_to_array);
    }

    /**
     * @uses   \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite
     *
     * @return void
     */
    public function testDeprecationOfPropertiesGetUndefined()
    {
        $this->mockAuthToken();
        $this->http->setUp();

        $api = new SeaTableApi($this->getOptions());

        $this->assertFalse(isset($api->undefinedProperty));
        $this->assertNull(@$api->undefinedProperty);

        $this->expectErrorMessage(
            sprintf(
                'Undefined property: SeaTable\SeaTableApi\SeaTableApi::$undefinedProperty in %s on line %d',
                __FILE__,
                __LINE__ + 4
            )
        );
        (PHP_VERSION_ID < 80000) ? $this->expectNotice() : $this->expectWarning();
        $this->assertNull($api->undefinedProperty);
    } // @codeCoverageIgnore

    /**
     * @uses   \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite
     * @uses   \SeaTable\SeaTableApi\Compat\Deprecation\Php::triggerDeprecation
     *
     * @return void
     */
    public function testDeprecationOfPropertiesGetDeprecatedDefined()
    {
        $this->mockAuthToken();
        $this->http->setUp();

        $api = new SeaTableApi($this->getOptions());

        $this->assertTrue(isset($api->response_object_to_array));
        $this->assertFalse(@$api->response_object_to_array);
    }

    /**
     * @codeCoverageIgnore
     *
     * @return array
     */
    public function provideDeprecatedPublicPropertyNames(): array
    {
        return [
            'seatable_code' => ['seatable_code', 200],
            'seatable_status' => ['seatable_status', 'OK'],
            'response_info' => ['response_info', ['url' => 'http://localhost:8082/api2/auth-token/']],
        ];
    }

    /**
     * @dataProvider provideDeprecatedPublicPropertyNames
     *
     * @return void
     * @uses   \SeaTable\SeaTableApi\Compat\Deprecation\Php::triggerDeprecation
     * @uses   \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite
     */
    public function testDeprecationOfPreviousPublicPropertiesGiveNotice(string $name, $default)
    {
        $this->mockAuthToken();
        $this->http->setUp();

        $api = new SeaTableApi($this->getOptions());

        if (is_array($default)) {
            $actual = @$api->$name;
            $this->assertIsArray($actual, "property: $name; default: " . var_export($default, true));
            foreach ($default as $key => $expected) {
                $this->assertArrayHasKey($key, $actual, "property: $name; default: " . var_export($default, true));
                $this->assertSame($expected, $actual[$key], "property: $name [$key]: $expected");
            }
        } else {
            $this->assertSame($default, @$api->$name, "property: $name; default: $default");
        }

        $this->expectDeprecationMessage(
            sprintf(
                'Since seatable/seatable-api-php 0.1.4: Reading of SeaTableApi->%s is deprecated and will be removed in a future version.',
                $name
            )
        );
        $this->expectDeprecation();
        $this->assertNull($api->$name);
    } // @codeCoverageIgnore

    /**
     * @dataProvider provideDeprecatedPublicPropertyNames
     *
     * @return void
     * @uses   \SeaTable\SeaTableApi\Compat\Deprecation\Php::triggerDeprecation
     * @uses   \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite
     */
    public function testDeprecationOfPreviousPublicPropertiesAreSet(string $name)
    {
        $this->mockAuthToken();
        $this->http->setUp();

        $api = new SeaTableApi($this->getOptions());

        $this->assertTrue(isset($api->$name));

        $this->expectDeprecationMessage(
            sprintf(
                'Since seatable/seatable-api-php 0.1.4: Reading of SeaTableApi->%s is deprecated and will be removed in a future version.',
                $name
            )
        );
        $this->expectDeprecation();
        $this->assertNull($api->$name);
    } // @codeCoverageIgnore

    /**
     * @dataProvider provideDeprecatedPublicPropertyNames
     *
     * @return void
     * @uses   \SeaTable\SeaTableApi\Compat\Deprecation\Php::triggerDeprecation
     * @uses   \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite
     */
    public function testDeprecationOfPreviousPublicPropertiesGiveDeprecationWarningOnSet(string $name)
    {
        $this->mockAuthToken();
        $this->http->setUp();

        $api = new SeaTableApi($this->getOptions());

        $this->expectDeprecationMessage(
            sprintf(
                'Since seatable/seatable-api-php 0.1.4: Setting of SeaTableApi->%s has no effect on the API, is deprecated and the property for reading will be removed in a future version.',
                $name
            )
        );
        $this->expectDeprecation();
        $this->assertNull($api->$name = null);
    } // @codeCoverageIgnore

    /**
     * by default SSL related curl options should be the library default.
     */
    public function testCurlSslDefaultOptions()
    {
        $this->mockAuthToken();
        $this->http->setUp();

        $api = new SeaTableApi($this->getOptions());

        $apiHttpOptions = $this->getInternalHttpOptions($api);
        self::assertArrayNotHasKey(CURLOPT_SSL_VERIFYPEER, $apiHttpOptions);
        self::assertArrayNotHasKey(CURLOPT_SSL_VERIFYHOST, $apiHttpOptions);
    }

    private function getInternalHttpOptions(SeaTableApi $api): array
    {
        $reflectionRecCurlClientEx = new \ReflectionProperty($api, 'restCurlClientEx');
        $reflectionRecCurlClientEx->setAccessible(true);
        /** @var RestCurlClientEx $restCurlClientEx */
        $restCurlClientEx = $reflectionRecCurlClientEx->getValue($api);

        $reflectionHttpOptions = new \ReflectionProperty($restCurlClientEx, 'http_options');
        $reflectionHttpOptions->setAccessible(true);
        return $reflectionHttpOptions->getValue($restCurlClientEx);
    }

    /**
     * (at least) SSL related curl options need to be set via ctor parameter
     * as otherwise there is no upgrade path.
     */
    public function testCurlHttpOptions()
    {
        $this->mockAuthToken();
        $this->http->setUp();

        /** @noinspection CurlSslServerSpoofingInspection */
        $api = new SeaTableApi(
            $this->getOptions(['http_options' => [
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
            ]])
        );

        $apiHttpOptions = $this->getInternalHttpOptions($api);
        self::assertArrayHasKey(CURLOPT_SSL_VERIFYPEER, $apiHttpOptions);
        self::assertFalse($apiHttpOptions[CURLOPT_SSL_VERIFYPEER]);
        self::assertArrayHasKey(CURLOPT_SSL_VERIFYHOST, $apiHttpOptions);
        self::assertFalse($apiHttpOptions[CURLOPT_SSL_VERIFYHOST]);
    }

    /**
     * test debug() is not a callable any longer (deprecated in 0.0.4)
     */
    public function testDebugDeprecation()
    {
        $this->mockAuthToken();
        $this->http->setUp();

        $api = new SeaTableApi($this->getOptions());
        self::assertFalse(method_exists($api, 'debug'), 'debug() method must not exist any longer');
        self::assertIsNotCallable([$api, 'debug'], 'SeaTableApi::debug() method must not be callable any longer');
    }

    /**
     * @codeCoverageIgnore
     * @return array|string[][]
     */
    public function provideDeprecatedMethods(): array
    {
        return [
            'get' => ['get'],
            'post' => ['post'],
            'put' => ['put'],
            'delete' => ['delete'],
        ];
    }

    /**
     * @dataProvider provideDeprecatedMethods
     * @param string $method
     * @return void
     * @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php
     */
    public function testMethodDeprecation(string $method)
    {
        $this->mockAuthToken();
        $this->http->setUp();
        $api = new SeaTableApi($this->getOptions());

        $this->expectDeprecationMessage(
            sprintf(
                'Since seatable/seatable-api-php 0.1.4: SeaTableApi::%s() is deprecated, there is no replacement. In %s on line %d',
                $method,
                __FILE__,
                __LINE__ + 4
            )
        );
        $this->expectDeprecation();
        !$api->$method('url');
    } // @codeCoverageIgnore

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
     * stub account info request
     */
    private function mockAccountInfo()
    {
        self::assertSame('1', ini_get('zend.assertions'));
        assert(
            $this->http->mock
                ->when()
                ->methodIs('GET')
                ->pathIs('/api2/account/info/')
                ->then()
                ->body('{
  "org_id": 42,
  "is_org_staff": 1,
  "space_usage": "0.0065038%",
  "total": 1000000000,
  "usage": 65038,
  "row_usage_rate": "9.15%",
  "row_total": 2000,
  "row_usage": 183,
  "avatar_url": "https://example.net/image-view/avatars/4/2/39be79e553305e5dcd738fabc9978c/resized/42/306ecbf862d9909f9d87516f32c374fd.png",
  "email": "cb45042f1901a0aeafeb42e464d6582f@auth.local",
  "name": "Jane",
  "login_id": "",
  "contact_email": "jane.doe@example.net",
  "institution": "",
  "is_staff": false,
  "enable_chargebee": false,
  "enable_subscription": false,
  "dtable_updates_email_interval": 0,
  "dtable_collaborate_email_interval": 0
}')
                ->end() instanceof MockBuilder
        );
    }

    /**
     * @return array minimal options for the http mock
     */
    private function getOptions(array $defaults = null): array
    {
        return ((array) $defaults) + [
                'url' => $this->getServerUrl(),
                'user' => 'u',
                'password' => 'p',
            ];
    }
}
