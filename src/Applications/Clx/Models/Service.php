<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 13:56
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class Service extends BaseResponse
{
    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Service
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}