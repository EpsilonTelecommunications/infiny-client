<?php
/**
 * User: Russell Galpin <russ@7d-digital.co.uk>
 * Date: 11/10/2018
 * Time: 11:53
 */

namespace Infiny\Client;


abstract class BaseRequest implements \JsonSerializable
{
    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        return $this->getRequestData();
    }

    abstract function getRequestData();
}