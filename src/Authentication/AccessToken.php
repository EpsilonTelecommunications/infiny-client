<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 09:24
 */

namespace Infiny\Authentication;

use Infiny\Client\BaseResponse;
use Infiny\Contracts\AccessToken as AccessTokenInterface;


class AccessToken extends BaseResponse implements AccessTokenInterface
{
    private $accessToken;

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
}