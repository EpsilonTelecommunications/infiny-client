<?php
/**
 * User: Russell Galpin <russ@7d-digital.co.uk>
 * Date: 11/10/2018
 * Time: 09:25
 */

namespace Infiny\Client;

use GuzzleHttp\ClientInterface;
use Infiny\Applications\Clx\Models\Graph;
use Infiny\Applications\Clx\Models\Port;
use Infiny\Applications\Clx\Models\Ports;
use Infiny\Applications\Clx\Models\Products;
use Infiny\Applications\Clx\Models\Services;
use Infiny\Applications\Clx\Models\Service;
use Infiny\Applications\Clx\Models\ServiceCreated;
use Infiny\Applications\Clx\Models\ServiceTypes;
use Infiny\Applications\Clx\Models\Vlans;
use Infiny\Authentication\AccessTokenRequest;
use Infiny\Contracts\HttpClient;
use Infiny\Contracts\AccessToken as AccessTokenInterface;
use Infiny\Contracts\BaseResponse as BaseResponseInterface;
use Infiny\Authentication\AccessToken;
use Infiny\Exceptions\MissingCredentialsException;
use Infiny\Applications\Infiny\Success;
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

    public function __construct(AccessTokenInterface $accessToken = null, ClientInterface $client = null)
    {
        if($accessToken) {
            $this->setAccessToken($accessToken);
        }

        if ($client) {
            $this->setClient($client);
        } else {
            $this->setClient(new \GuzzleHttp\Client());
        }
    }

    public $resourceMap = [
        'oauth2/access-token' => AccessToken::class,
        'services/{1}/service' => Service::class,
        'services/{1}/service/renew' => Success::class,
        'services' => Services::class,
        'services/create' => ServiceCreated::class,
        'services/ports-available' => Ports::class,
        'services/pricing' => Products::class,
        'services/available-vlans' => Vlans::class,
        'services/types' => ServiceTypes::class,
        'services/{1}/graph/{2}' => Graph::class,
        'ports/available' => Ports::class,
        'ports' => Ports::class,
        'ports/{1}/port' => Port::class
    ];

    /**
     * @param $resource
     * @param array $requestParams
     * @return BaseResponseInterface
     */
    public function get($resource, $requestParams = []): BaseResponseInterface
    {
        return $this->parseResponse(
            $this->getClient()->request('get', $this->getEndpoint($resource), [
                'headers' => $this->getHeaders(),
                'query' => $requestParams
            ]),
            $this->getModelFromResourceMap($resource)
        );
    }

    /**
     * @param $resource
     * @param BaseRequest|null $data
     * @param array $requestParams
     * @return BaseResponseInterface
     */
    public function post($resource, BaseRequest $data = null, $requestParams = []): BaseResponseInterface
    {
        return $this->parseResponse(
            $this->getClient()->request('post', $this->getEndpoint($resource), [
                'headers' => $this->getHeaders(),
                'query' => $requestParams,
                'body' => json_encode($data)
            ]),
            $this->getModelFromResourceMap($resource)
        );
    }

    /**
     * @param $resource
     * @param BaseRequest|null $data
     * @param array $requestParams
     * @return BaseResponseInterface
     */
    public function put($resource, BaseRequest $data = null, $requestParams = []): BaseResponseInterface
    {
        return $this->parseResponse(
            $this->getClient()->request('put', $this->getEndpoint($resource), [
                'headers' => $this->getHeaders(),
                'query' => $requestParams,
                'body' => json_encode($data)
            ]),
            $this->getModelFromResourceMap($resource)
        );
    }

    /**
     * @param $resource
     * @param array $requestParams
     * @return BaseResponseInterface
     */
    public function delete($resource, $requestParams = []): BaseResponseInterface
    {
        return $this->parseResponse(
            $this->getClient()->request('delete', $this->getEndpoint($resource), [
                'headers' => $this->getHeaders(),
                'query' => $requestParams
            ]),
            $this->getModelFromResourceMap($resource)
        );
    }

    /**
     * @param $resource
     * @return string
     */
    protected function getEndpoint($resource)
    {
        return sprintf('%s/%s', rtrim(self::API_URL, '/'), str_replace("{", "", str_replace("}", "", $resource)));
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
            'Accept' => $this->getAcceptHeader(),
            'Content-Type' => 'application/json'
        ];
    }

    protected function parseResponse(ResponseInterface $response, $responseModel)
    {
        return new $responseModel(json_decode((string) $response->getBody()));
    }

    public function createAccessToken()
    {
        if ($this->getClientId() && $this->getClientSecret()) {

            $accessTokenRequest = new AccessTokenRequest();
            $accessTokenRequest->setClientSecret($this->getClientSecret())
                ->setClientId($this->getClientId());

            return $this->parseResponse(
                $this->getClient()->request('post', $this->getEndpoint('oauth2/access-token'), [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => $this->getAcceptHeader()
                    ],
                    'body' => json_encode($accessTokenRequest)
                ]),
                $this->getModelFromResourceMap('oauth2/access-token')
            );
        } else {
            throw new MissingCredentialsException();
        }
    }

    private function getModelFromResourceMap($resource)
    {
        if (preg_match("/\{.+\}/", $resource)) {
            $resource = preg_replace_callback('/\{.+?\}/', function($matches) {
                static $i=1;
                return sprintf("{%d}", $i++);
            }, $resource);
        }
        if (isset($this->resourceMap[$resource])) {
            return $this->resourceMap[$resource];
        }
        return null;
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
        if (!$this->accessToken) {
            $this->accessToken = $this->createAccessToken();
        }
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