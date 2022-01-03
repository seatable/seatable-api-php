<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi;

use InterNations\Component\HttpMock\MockBuilder;
use SeaTable\SeaTableApi\Internal\RestCurlClientEx;
use stdClass;

/**
 * HttpMockTest
 *
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

        $actual = (new SeaTableApi($this->getOptions()))->getAccountInfo();

        self::assertIsObject($actual);
    }

    /**
     * test for $response_object_to_array backwards compat behaviour
     *
     * @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite
     * @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php::triggerDeprecation
     */
    public function testRemovedResponseAsArrayPropertyCanBeDynamicallySetToTrueButHasNoEffect()
    {
        $this->mockAuthToken();
        $this->mockAccountInfo();
        $this->http->setUp();

        $api = new SeaTableApi($this->getOptions());

        $api->response_object_to_array = true;
        $result = $api->getAccountInfo();
        $this->assertIsObject($result);
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
                'Undefined property: SeaTable\SeaTableApi\SeaTableApi::$undefinedProperty'
            )
        );
        (PHP_VERSION_ID < 80000) ? $this->expectNotice() : $this->expectWarning();
        $this->assertNull($api->undefinedProperty);
    } // @codeCoverageIgnore


    /**
     * @codeCoverageIgnore
     *
     * @return array
     */
    public function provideRemovedDeprecatedPublicPropertyNames(): array
    {
        return [
            'response_info' => ['response_info'],
            'response_object_to_array' => ['response_object_to_array'],
            'seatable_code' => ['seatable_code'],
            'seatable_status' => ['seatable_status'],
        ];
    }

    /**
     * @dataProvider provideRemovedDeprecatedPublicPropertyNames
     * @uses         \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite
     *
     * @param string $name
     * @return void
     */
    public function testRemovalOfPreviousDeprecatedPublicProperties(string $name)
    {
        $this->mockAuthToken();
        $this->http->setUp();

        $api = new SeaTableApi($this->getOptions());
        $this->assertObjectNotHasAttribute($name, $api, "property removed: $name");
        $this->assertFalse(isset($api->$name), "property not isset(): $name");
        $this->assertNull(@$api->$name, "property undefined notice suppressed is default null: $name");

        $this->expectErrorMessageMatches(
            sprintf(
                '~^\QUndefined property: SeaTable\SeaTableApi\SeaTableApi::$%s\E$~',
                $name
            )
        );
        (PHP_VERSION_ID < 80000) ? $this->expectNotice() : $this->expectWarning();
        $this->assertNull($api->$name);
    } // @codeCoverageIgnore

    /**
     * @dataProvider provideRemovedDeprecatedPublicPropertyNames
     *
     * @return void
     */
    public function testRemovedPreviousPublicPropertiesGiveNoWarningOnSet(string $name)
    {
        $this->mockAuthToken();
        $this->http->setUp();

        $api = new SeaTableApi($this->getOptions());

        $this->assertNull($api->$name = null);
    }

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

    /** @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php */
    public function testGetDTableTokenThrows()
    {
        $this->mockAuthToken();
        $this->http->setUp();
        $api = new SeaTableApi($this->getOptions());

        $this->expectExceptionMessage('getDtableToken parameters are wrong: use either api_token or workspace_id + table_name');
        $this->expectException(Exception::class);
        !@$api->getDTableToken([]);
    } // @codeCoverageIgnore

    /** @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php */
    public function testGetDTableTokenIsDeprecated()
    {
        $this->mockAuthToken();
        $this->http->setUp();
        $api = new SeaTableApi($this->getOptions());

        $this->expectDeprecationMessage(sprintf('Since seatable/seatable-api-php 0.1.11: SeaTableApi::getDTableToken() is deprecated, use SeaTableApi::getBaseAppAccessToken() or ::getBaseAccessToken() instead in %s on line %d', __FILE__, __LINE__ + 2));
        $this->expectDeprecation();
        !$api->getDTableToken([]);
    } // @codeCoverageIgnore

    /** @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php */
    public function testGetDTableTokenWithApiTokenIsDeprecated()
    {
        $this->mockAuthToken();
        $this->http->setUp();
        $api = new SeaTableApi($this->getOptions());

        $this->expectDeprecationMessage(sprintf('Since seatable/seatable-api-php 0.1.11: SeaTableApi::getDTableToken() is deprecated, use SeaTableApi::getBaseAppAccessToken() instead in this case in %s on line %d', __FILE__, __LINE__ + 2));
        $this->expectDeprecation();
        !$api->getDTableToken(['api_token' => '452fd5ab30de6a561460c9347f2c88036e10ad65']);
    } // @codeCoverageIgnore

    /** @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php */
    public function testGetDTableTokenWithApiTokenDeprecated()
    {
        $this->mockAuthToken();
        $this->mockDTableAuthWithApiToken();
        $this->http->setUp();
        $api = new SeaTableApi($this->getOptions());

        $this->assertInstanceOf(stdClass::class, @$api->getDTableToken(['api_token' => '452fd5ab30de6a561460c9347f2c88036e10ad65']));
    }

    /** @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php */
    public function testGetDTableTokenWithWorkspaceIdAndTableNameIsDeprecated()
    {
        $this->mockAuthToken();
        $this->http->setUp();
        $api = new SeaTableApi($this->getOptions());

        $this->expectDeprecationMessage(sprintf('Since seatable/seatable-api-php 0.1.11: SeaTableApi::getDTableToken() is deprecated, use SeaTableApi::getBaseAccessToken() instead in this case in %s on line %d', __FILE__, __LINE__ + 2));
        $this->expectDeprecation();
        !$api->getDTableToken(['workspace_id' => 1, 'table_name' => 'Test-Base']);
    } // @codeCoverageIgnore

    /** @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php */
    public function testGetDTableTokenWithWorkspaceIdAndTableNameDeprecated()
    {
        $this->mockAuthToken();
        $this->mockDTableAuthWithWorkspaceIdAndTableName();
        $this->http->setUp();
        $api = new SeaTableApi($this->getOptions());

        $this->assertInstanceOf(stdClass::class, @$api->getDTableToken(['workspace_id' => 1, 'table_name' => 'Test-Base']));
    }

    public function testGetBaseAppAccessToken()
    {
        $this->mockAuthToken();
        $this->mockDTableAuthWithApiToken();
        $this->http->setUp();
        $api = new SeaTableApi($this->getOptions());

        $this->assertInstanceOf(stdClass::class, $api->getBaseAppAccessToken('452fd5ab30de6a561460c9347f2c88036e10ad65'));
    }

    public function testGetBaseAccessToken()
    {
        $this->mockAuthToken();
        $this->mockDTableAuthWithWorkspaceIdAndTableName();
        $this->http->setUp();
        $api = new SeaTableApi($this->getOptions());

        $this->assertInstanceOf(stdClass::class, $api->getBaseAccessToken(1, 'Test-Base'));
    }

    public function testUpdateUser()
    {
        $this->mockAuthToken();
        $this->mockUpdateUser();
        $this->http->setUp();
        $api = new SeaTableApi($this->getOptions());

        $this->assertIsObject($api->sysAdminUpdateUser('123456786569491ba42905bf1647fd3f@auth.local'));
    }

    /**
     * @uses \SeaTable\SeaTableApi\Compat\Deprecation\Php
     * @return void
     */
    public function testActivateDeactivateUserDeprecation()
    {
        $this->mockAuthToken();
        $this->mockUpdateUser();
        $this->http->setUp();
        $api = new SeaTableApi($this->getOptions());
        $this->assertIsObject(@$api->updateUser('123456786569491ba42905bf1647fd3f@auth.local', ['is_active' => 'true']));
        $this->assertIsObject(@$api->updateUser('123456786569491ba42905bf1647fd3f@auth.local', ['is_active' => 'false']));

        $this->expectDeprecationMessage('Since seatable/seatable-api-php 0.1.13: SeaTableApi::activateUser() is deprecated, use SeaTableApi::sysAdminUpdateUser($email, [\'is_active\' => \'true\']) instead');
        $this->expectDeprecation();

        $this->assertIsObject($api->activateUser('123456786569491ba42905bf1647fd3f@auth.local'));
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

    private function mockDTableAuthWithApiToken()
    {
        self::assertSame('1', ini_get('zend.assertions'));
        assert(
            $this->http->mock
                ->when()
                ->methodIs('GET')
                ->pathIs('/api/v2.1/dtable/app-access-token/')
                ->then()
                ->body('{"app_name":"test","access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NDM1MzM3MDQsImR0YWJsZV91dWlkIjoiMjg0Nzg5NTctNGExNy00ZTI1LTk0OGQtZTVhNTliOGE4NmM1IiwidXNlcm5hbWUiOiIiLCJwZXJtaXNzaW9uIjoicnciLCJhcHBfbmFtZSI6InRlc3QifQ.g3q4V_VV0cxYkMWdFR48IUhajZ6Ibl-5R9iBz-WwsGQ","dtable_uuid":"28478957-4a17-4e25-948d-e5a59b8a86c5","dtable_server":"http://localhost/dtable-server/","dtable_socket":"http://localhost/","dtable_db":"http://localhost/dtable-db/","workspace_id":1,"dtable_name":"Test-Base"}')
                ->end() instanceof MockBuilder
        );
    }

    private function mockDTableAuthWithWorkspaceIdAndTableName()
    {
        self::assertSame('1', ini_get('zend.assertions'));
        assert(
            $this->http->mock
                ->when()
                ->methodIs('GET')
                ->pathIs('/api/v2.1/workspace/1/dtable/Test-Base/access-token/')
                ->then()
                ->body('{"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NDM1MzQ1MTgsImR0YWJsZV91dWlkIjoiMjg0Nzg5NTctNGExNy00ZTI1LTk0OGQtZTVhNTliOGE4NmM1IiwidXNlcm5hbWUiOiI4OTFlNDIyMmI3YmI0MzhlYWYzZmRmNTlkMDM0OGUyZUBhdXRoLmxvY2FsIiwiaWRfaW5fb3JnIjoiIiwicGVybWlzc2lvbiI6InJ3In0.lYk7OZWuw9Wxa8aoAealjQE4rLFKdCwpfORnDKBJEcs","dtable_uuid":"28478957-4a17-4e25-948d-e5a59b8a86c5","dtable_server":"http://localhost/dtable-server/","dtable_socket":"http://localhost/"}')
                ->end() instanceof MockBuilder
        );
    }

    /**
     * stub update user request for activation
     */
    private function mockUpdateUser()
    {
        self::assertSame('1', ini_get('zend.assertions'));
        assert(
            $this->http->mock
                ->when()
                ->methodIs('PUT')
                ->pathIs('/api/v2.1/admin/users/123456786569491ba42905bf1647fd3f%40auth.local/')
                ->then()
                ->body('{
  "email": "123456786569491ba42905bf1647fd3f@auth.local",
  "name": "Jasmin Tee",
  "contact_email": "jasmin@example.com",
  "login_id": "",
  "id_in_org": "013",
  "is_staff": false,
  "is_active": true,
  "org_id": 1,
  "org_name": "Team SeaTable",
  "create_time": "2020-11-18T12:30:31+00:00",
  "role": "default",
  "update_status_tip": ""
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
