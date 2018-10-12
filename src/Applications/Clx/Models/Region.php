<?php
/**
 * User: russ
 * Date: 12/10/2018
 * Time: 09:38
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class Region extends BaseResponse
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
     * @return Region
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}