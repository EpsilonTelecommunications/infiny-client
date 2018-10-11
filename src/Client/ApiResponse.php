<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 10:14
 */

namespace Infiny\Client;

use \Infiny\Contracts\ApiResponse as ApiResponseInterface;

class ApiResponse implements ApiResponseInterface
{
    private $body;
    private $statusCode;

    /**
     * @return mixed
     */
    public function getBody(): \stdClass
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     * @return ApiResponse
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return ApiResponse
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }
}