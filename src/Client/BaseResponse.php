<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 11:40
 */

namespace Infiny\Client;


use Infiny\Contracts\ApiResponse;
use Infiny\Contracts\BaseResponse as BaseResponseInterface;


class BaseResponse implements BaseResponseInterface
{
    public function __construct(ApiResponse $response)
    {
        foreach($response->getBody() as $key=>$value) {
            $studly = str_replace(" ", "", ucwords(str_replace(['-', '_'], ' ', $key)));
            if(method_exists($this, 'add'.$studly)) {
                $reflectionClass = new \ReflectionClass(__CLASS__);
                $parameters = $reflectionClass->getMethod('add'.$studly)->getParameters();
                $parameterClass = $parameters[0]->getType();
                $parameter = new $parameterClass($value);

                $this->{'add'.$studly}($parameter);
            } elseif(method_exists($this, 'set'.$studly)) {
                $this->{'set'.$studly}($value);
            }
        }
    }
}