<?php
/**
 * User: russ
 * Date: 12/10/2018
 * Time: 14:17
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class Category extends BaseResponse
{
    private $name;
    private $code;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     * @return Category
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }
}