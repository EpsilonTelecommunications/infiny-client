<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 09:26
 */

namespace Contracts;


interface HttpClient
{
    public function get($resource, $requestParams = []) : ApiResponse;
    public function post($resource, $data = null, $requestParams = []) : ApiResponse;
    public function put($resource, $data = null, $requestParams = []) : ApiResponse;
    public function delete($resource, $requestParams = []) : ApiResponse;

    public function getAccessToken() : AccessToken;
}