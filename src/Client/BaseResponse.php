<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 11:40
 */

namespace Infiny\Client;


use Doctrine\Common\Inflector\Inflector;
use Infiny\Contracts\BaseResponse as BaseResponseInterface;

abstract class BaseResponse implements BaseResponseInterface
{
    public function __construct($data)
    {
        foreach($data as $key=>$value) {
            $studly = Inflector::classify($key);
            $studlySingular = Inflector::singularize($studly);
            $class = new \ReflectionClass($this);
            $studlyClass = Inflector::classify($class->getShortName());
            $studlyClassSingular = Inflector::singularize($studlyClass);
            if (is_object($value) && is_numeric($key) && method_exists($this, 'add'.$studlyClassSingular)) {
                $reflectionMethod = new \ReflectionMethod($this, 'add' . $studlyClassSingular);
                $parameters = $reflectionMethod->getParameters();
                if (count($parameters)) {
                    $parameterClass = $parameters[0]->getType();
                    $class = $parameterClass->getName();
                    $parameterClass = new $class($value);
                    $this->{'add' . $studlyClassSingular}($parameterClass);
                }
            } elseif (method_exists($this, 'add'.$studlySingular)) {
                if (is_array($value)) {
                    $reflectionMethod = new \ReflectionMethod($this, 'add' . $studlySingular);
                    $parameters = $reflectionMethod->getParameters();
                    if (count($parameters)) {
                        $parameterClass = $parameters[0]->getType();
                        $class = $parameterClass->getName();
                        foreach($value as $subKey=>$subValue) {
                            $parameterClass = new $class($subValue);
                            $this->{'add' . $studlySingular}($parameterClass);
                        }
                    }
                }
            } elseif (method_exists($this, 'add'.$studly)) {
                if (is_array($value)) {
                    $reflectionMethod = new \ReflectionMethod($this, 'add' . $studly);
                    $parameters = $reflectionMethod->getParameters();
                    if (count($parameters)) {
                        $parameterClass = $parameters[0]->getType();
                        $class = $parameterClass->getName();
                        foreach($value as $subKey=>$subValue) {
                            $parameterClass = new $class($subValue);
                            $this->{'add' . $studly}($parameterClass);
                        }
                    }
                }
            } elseif (method_exists($this, 'set'.$studly)) {
                $reflectionMethod = new \ReflectionMethod($this, 'set' . $studly);
                $parameters = $reflectionMethod->getParameters();
                if (count($parameters)) {
                    $parameterClass = $parameters[0]->getType();
                    if ($parameterClass) {
                        $class = $parameterClass->getName();
                        $parameterClass = new $class($value);
                        $this->{'set' . $studly}($parameterClass);
                    } else {
                        $this->{'set'.$studly}($value);
                    }
                }
            }
        }
    }
}