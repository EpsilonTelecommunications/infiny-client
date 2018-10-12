<?php
/**
 * User: russ
 * Date: 12/10/2018
 * Time: 10:30
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class Continent extends BaseResponse
{
    private $id;
    private $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Continent
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Continent
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}