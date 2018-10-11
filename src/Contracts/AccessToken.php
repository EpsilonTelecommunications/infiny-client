<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 09:35
 */

namespace Infiny\Contracts;


interface AccessToken extends BaseResponse
{
    public function getAccessToken() : String;
}