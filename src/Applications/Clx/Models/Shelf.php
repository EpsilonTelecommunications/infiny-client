<?php
/**
 * User: Russell Galpin <russ@7d-digital.co.uk>
 * Date: 12/10/2018
 * Time: 09:47
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class Shelf extends BaseResponse
{
    private $index;
    private $name;

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param mixed $index
     * @return Shelf
     */
    public function setIndex($index)
    {
        $this->index = $index;
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
     * @return Shelf
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}