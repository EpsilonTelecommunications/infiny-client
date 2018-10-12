<?php
/**
 * User: russ
 * Date: 12/10/2018
 * Time: 10:31
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class Country extends BaseResponse
{
    private $id;
    private $name;
    private $continent;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Country
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
     * @return Country
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Continent
     */
    public function getContinent(): Continent
    {
        return $this->continent;
    }

    /**
     * @param Continent $continent
     * @return Country
     */
    public function setContinent(Continent $continent)
    {
        $this->continent = $continent;
        return $this;
    }
}