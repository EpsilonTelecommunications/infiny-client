<?php
/**
 * User: russ
 * Date: 19/10/2018
 * Time: 09:44
 */

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Infiny\CloudLx;
use Infiny\Authentication\AccessToken;

abstract class MockApi extends TestCase
{
    protected $apiClient;

    protected $mockHandler;


    protected function setUp()
    {
        $this->mockHandler = new MockHandler();

        $httpClient = new Client([
            'handler' => $this->mockHandler,
        ]);

        $this->apiClient = new CloudLx('clientId', 'clientSecret', null, $httpClient);
        $this->apiClient = new CloudLx('clientId', 'clientSecret', $this->getAccessToken(), $httpClient);
    }

    protected function getAccessToken(): AccessToken
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . '/json/AccessToken.json')));

        return $this->apiClient->getClient()->getAccessToken();
    }
}