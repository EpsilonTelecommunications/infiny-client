<?php
/**
 * User: russ
 * Date: 12/10/2018
 * Time: 10:28
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class Datacentre extends BaseResponse
{
    private $id;
    private $name;
    private $city;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Datacentre
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
     * @return Datacentre
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return City
     */
    public function getCity(): City
    {
        return $this->city;
    }

    /**
     * @param City $city
     * @return Datacentre
     */
    public function setCity(City $city)
    {
        $this->city = $city;
        return $this;
    }
}