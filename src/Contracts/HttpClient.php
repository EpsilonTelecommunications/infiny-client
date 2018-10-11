<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 09:26
 */

namespace Infiny\Contracts;


interface HttpClient
{
    public function get($resource, $requestParams = []) : BaseResponse;
    public function post($resource, $data = null, $requestParams = []) : BaseResponse;
    public function put($resource, $data = null, $requestParams = []) : BaseResponse;
    public function delete($resource, $requestParams = []) : BaseResponse;

    public function getAccessToken() : AccessToken;
}