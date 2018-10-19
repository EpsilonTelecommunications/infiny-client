<?php
/**
 * User: Russell Galpin <russ@7d-digital.co.uk>
 * Date: 11/10/2018
 * Time: 09:24
 */

namespace Infiny\Authentication;

use Infiny\Client\BaseResponse;
use Infiny\Contracts\AccessToken as AccessTokenInterface;


class AccessToken extends BaseResponse implements AccessTokenInterface
{
    private $accessToken;
    private $refreshToken;
    private $tokenType;
    private $expiresIn;


    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param mixed $accessToken
     * @return AccessToken
     */
    public function setAccessToken($accessToken): AccessToken
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param mixed $refreshToken
     * @return AccessToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTokenType()
    {
        return $this->tokenType;
    }

    /**
     * @param mixed $tokenType
     * @return AccessToken
     */
    public function setTokenType($tokenType)
    {
        $this->tokenType = $tokenType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }

    /**
     * @param mixed $expiresIn
     * @return AccessToken
     */
    public function setExpiresIn($expiresIn)
    {
        $this->expiresIn = $expiresIn;
        return $this;
    }
}