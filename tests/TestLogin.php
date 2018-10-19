<?php
/**
 * User: russ
 * Date: 19/10/2018
 * Time: 09:20
 */

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Client;
use Infiny\CloudLx;
use Infiny\Authentication\AccessToken;

class TestLogin extends MockApi
{
    protected function setUp()
    {
        $this->mockHandler = new MockHandler();

        $httpClient = new Client([
            'handler' => $this->mockHandler,
        ]);

        $this->apiClient = new CloudLx('clientId', 'clientSecret', null, $httpClient);
    }

    /**
     * @testAccessToken
     */
    public function testAccessToken()
    {
        $this->assertInstanceOf(AccessToken::class, $this->getAccessToken());
    }

    /**
     * @testAccessToken
     */
    public function testAccessTokenAccessTokenValue()
    {
        $this->assertTrue(strlen($this->getAccessToken()->getAccessToken()) == 40);
    }

    /**
     * @testAccessToken
     */
    public function testAccessTokenRefreshTokenValue()
    {
        $this->assertTrue(strlen($this->getAccessToken()->getRefreshToken()) == 40);
    }

    /**
     * @testAccessToken
     */
    public function testAccessTokenGrantType()
    {
        $this->assertTrue( $this->getAccessToken()->getTokenType() == 'client_credentials');
    }


}