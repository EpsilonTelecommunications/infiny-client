<?php
/**
 * User: Russell Galpin <russ@7d-digital.co.uk>
 * Date: 12/10/2018
 * Time: 13:27
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class Vlans extends BaseResponse
{
    private $vlans;

    /**
     * @return mixed
     */
    public function getVlans()
    {
        return $this->vlans;
    }

    /**
     * @param mixed $vlans
     * @return Vlans
     */
    public function setVlans($vlans)
    {
        $this->vlans = $vlans;
        return $this;
    }

    public function addVlan($vlan)
    {
        $this->vlans[] = $vlan;
        return $this;
    }
}