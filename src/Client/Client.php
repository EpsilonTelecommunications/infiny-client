<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 09:25
 */

namespace Infiny\Client;

use GuzzleHttp\ClientInterface;
use Infiny\Contracts\ApiResponse as ApiResponseInterface;
use Infiny\Contracts\HttpClient;
use Infiny\Contracts\AccessToken as AccessTokenInterface;
use Infiny\Authentication\AccessToken;
use Infiny\Exceptions\MissingCredentialsException;
use Psr\Http\Message\ResponseInterface;

class Client implements HttpClient
{
    private $clientId;
    private $clientSecret;
    private $accessToken;
    private $client;

    const API_URL = 'https://www.infiny.io/api/';
    const API_VERSION = 'v1';
    const API_SUBTYPE = 'cloudlx';

    public $resourceMap = [
        'oauth2/access-token' => AccessToken::class
    ];

    public function __construct(AccessTokenInterface $accessToken = null, ClientInterface $client = null)
    {
        if ($accessToken) {
            $this->setAccessToken($accessToken);
        } else {
            $this->setAccessToken($this->createAccessToken());
        }

        if ($client) {
            $this->setClient($client);
        } else {
            $this->setClient(new \GuzzleHttp\Client());
        }
    }

    /**
     * @param $resource
     * @param array $requestParams
     * @return ApiResponseInterface
     */
    public function get($resource, $requestParams = []): ApiResponseInterface
    {
        return $this->parseResponse(
            $this->getClient()->request('get', $this->getEndpoint($resource), [
                'headers' => $this->getHeaders(),
                'query' => $requestParams
            ]),
            $this->resourceMap[$resource]
        );
    }

    /**
     * @param $resource
     * @param null $data
     * @param array $requestParams
     * @return ApiResponseInterface
     */
    public function post($resource, $data = null, $requestParams = []): ApiResponseInterface
    {
        return $this->parseResponse(
            $this->getClient()->request('post', $this->getEndpoint($resource), [
                'headers' => $this->getHeaders(),
                'query' => $requestParams,
                'body' => $data
            ]),
            $this->resourceMap[$resource]
        );
    }

    /**
     * @param $resource
     * @param null $data
     * @param array $requestParams
     * @return ApiResponseInterface
     */
    public function put($resource, $data = null, $requestParams = []): ApiResponseInterface
    {
        return $this->parseResponse(
            $this->getClient()->request('put', $this->getEndpoint($resource), [
                'headers' => $this->getHeaders(),
                'query' => $requestParams,
                'body' => $data
            ]),
            $this->resourceMap[$resource]
        );
    }

    /**
     * @param $resource
     * @param array $requestParams
     * @return ApiResponseInterface
     */
    public function delete($resource, $requestParams = []): ApiResponseInterface
    {
        return $this->parseResponse(
            $this->getClient()->request('delete', $this->getEndpoint($resource), [
                'headers' => $this->getHeaders(),
                'query' => $requestParams
            ]),
            $this->resourceMap[$resource]
        );
    }

    /**
     * @param $resource
     * @return string
     */
    protected function getEndpoint($resource)
    {
        return sprintf('%s/%s', rtrim(self::API_URL, '/'), $resource);
    }

    /**
     * @return string
     */
    protected function getAcceptHeader()
    {
        return sprintf('application/vnd.%s.%s+json', self::API_SUBTYPE,self::API_VERSION);
    }

    /**
     * @return array
     */
    protected function getHeaders()
    {
        return [
            'Authorization' => sprintf('Bearer %s', $this->getAccessToken()->getAccessToken()),
            'Accept' => $this->getAcceptHeader()
        ];
    }

    protected function parseResponse(ResponseInterface $response, $responseModel)
    {
        $apiResponse = new ApiResponse();
        $apiResponse->setBody(json_decode((string) $response->getBody()))
            ->setStatusCode($response->getStatusCode());

        return new $responseModel($apiResponse);
    }

    public function createAccessToken()
    {
        if($this->getClientId() && $this->getClientSecret()) {
            return $this->parseResponse(
                $this->getClient()->request('post', $this->getEndpoint('oauth2/access-token'), [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => $this->getAcceptHeader()
                    ]
                ]),
                $this->resourceMap['oauth2/access-token']
            );
        } else {
            throw new MissingCredentialsException();
        }
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     * @return Client
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @param string $clientSecret
     * @return Client
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccessToken() : AccessTokenInterface
    {
        return $this->accessToken;
    }

    /**
     * @param AccessTokenInterface $accessToken
     * @return Client
     */
    public function setAccessToken(AccessTokenInterface $accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClient() : ClientInterface
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     * @return Client
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }
}