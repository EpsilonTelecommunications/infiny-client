<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 11:40
 */

namespace Infiny\Client;


use Doctrine\Common\Inflector\Inflector;
use Infiny\Contracts\BaseResponse as BaseResponseInterface;

class BaseResponse implements BaseResponseInterface
{
    public function __construct($data)
    {
        foreach($data as $key=>$value) {

            $studly = Inflector::classify($key);
            $studlySingular = Inflector::singularize($studly);
            if (method_exists($this, 'add'.$studlySingular)) {
                if (is_array($value)) {
                    $reflectionMethod = new \ReflectionMethod($this, 'add' . $studlySingular);
                    $parameters = $reflectionMethod->getParameters();
                    if(count($parameters)) {
                        $parameterClass = $parameters[0]->getType();
                        $class = $parameterClass->getName();
                        foreach($value as $subKey=>$subValue) {
                            $parameterClass = new $class($subValue);
                            $this->{'add' . $studlySingular}($parameterClass);
                        }
                    }
                }
            } elseif(method_exists($this, 'add'.$studly)) {
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