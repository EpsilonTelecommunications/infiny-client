<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 11:51
 */

namespace Infiny\Authentication;

use Infiny\Client\BaseRequest;

class AccessTokenRequest extends BaseRequest
{
    private $clientId;
    private $clientSecret;
    private $grantType = 'client_credentials';

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param mixed $clientId
     * @return AccessTokenRequest
     */
    public function setClientId($clientId): AccessTokenRequest
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @param mixed $clientSecret
     * @return AccessTokenRequest
     */
    public function setClientSecret($clientSecret): AccessTokenRequest
    {
        $this->clientSecret = $clientSecret;
        return $this;
    }

    /**
     * @return string
     */
    public function getGrantType(): string
    {
        return $this->grantType;
    }

    /**
     * @param string $grantType
     * @return AccessTokenRequest
     */
    public function setGrantType(string $grantType): AccessTokenRequest
    {
        $this->grantType = $grantType;
        return $this;
    }

    public function getRequestData()
    {
        return [
            'client_id' => $this->getClientId(),
            'client_secret' => $this->getClientSecret(),
            'grant_type' => $this->getGrantType()
        ];
    }
}