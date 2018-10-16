<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 09:26
 */

namespace Infiny\Contracts;


use Infiny\Client\BaseRequest;

interface HttpClient
{
    public function get($resource, $requestParams = []) : BaseResponse;
    public function post($resource, BaseRequest $data = null, $requestParams = []) : BaseResponse;
    public function put($resource, BaseRequest $data = null, $requestParams = []) : BaseResponse;
    public function delete($resource, $requestParams = []) : BaseResponse;

    public function getAccessToken() : AccessToken;
}