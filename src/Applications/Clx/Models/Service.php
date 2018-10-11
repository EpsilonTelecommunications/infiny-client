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
    
    private $id;
    private $name;
    private $vlan;
    private $nni_vlan;
    private $created;
    private $expires;
    private $protected;
    private $bandwidth;
    private $paused;
    private $expired;
    private $type;
    private $type_short_name;
    private $service_town;
    private $status;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Service
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVlan()
    {
        return $this->vlan;
    }

    /**
     * @param mixed $vlan
     * @return Service
     */
    public function setVlan($vlan)
    {
        $this->vlan = $vlan;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNniVlan()
    {
        return $this->nni_vlan;
    }

    /**
     * @param mixed $nni_vlan
     * @return Service
     */
    public function setNniVlan($nni_vlan)
    {
        $this->nni_vlan = $nni_vlan;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     * @return Service
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * @param mixed $expires
     * @return Service
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProtected()
    {
        return $this->protected;
    }

    /**
     * @param mixed $protected
     * @return Service
     */
    public function setProtected($protected)
    {
        $this->protected = $protected;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBandwidth()
    {
        return $this->bandwidth;
    }

    /**
     * @param mixed $bandwidth
     * @return Service
     */
    public function setBandwidth($bandwidth)
    {
        $this->bandwidth = $bandwidth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaused()
    {
        return $this->paused;
    }

    /**
     * @param mixed $paused
     * @return Service
     */
    public function setPaused($paused)
    {
        $this->paused = $paused;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * @param mixed $expired
     * @return Service
     */
    public function setExpired($expired)
    {
        $this->expired = $expired;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Service
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTypeShortName()
    {
        return $this->type_short_name;
    }

    /**
     * @param mixed $type_short_name
     * @return Service
     */
    public function setTypeShortName($type_short_name)
    {
        $this->type_short_name = $type_short_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getServiceTown()
    {
        return $this->service_town;
    }

    /**
     * @param mixed $service_town
     * @return Service
     */
    public function setServiceTown($service_town)
    {
        $this->service_town = $service_town;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return Service
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
     * @return Service
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}