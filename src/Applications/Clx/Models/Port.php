<?php
/**
 * User: russ
 * Date: 12/10/2018
 * Time: 09:11
 */

namespace Infiny\Applications\Clx\Models;


class Port
{
    private $id;
    private $ref;
    private $name;
    private $datacentreName;
    private $index;
    private $speed;
    private $throughput;
    private $committedBandwidth;
    private $committedBandwidthRaw;
    private $remainingBandwidth;
    private $remainingBandwidthRaw;
    private $utilisation;
    private $utilisationRaw;
    private $customer;
    private $customerId;
    private $odfPosition;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Port
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param mixed $ref
     * @return Port
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
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
     * @return Port
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDatacentreName()
    {
        return $this->datacentreName;
    }

    /**
     * @param mixed $datacentreName
     * @return Port
     */
    public function setDatacentreName($datacentreName)
    {
        $this->datacentreName = $datacentreName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param mixed $index
     * @return Port
     */
    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param mixed $speed
     * @return Port
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getThroughput()
    {
        return $this->throughput;
    }

    /**
     * @param mixed $throughput
     * @return Port
     */
    public function setThroughput($throughput)
    {
        $this->throughput = $throughput;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommittedBandwidth()
    {
        return $this->committedBandwidth;
    }

    /**
     * @param mixed $committedBandwidth
     * @return Port
     */
    public function setCommittedBandwidth($committedBandwidth)
    {
        $this->committedBandwidth = $committedBandwidth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommittedBandwidthRaw()
    {
        return $this->committedBandwidthRaw;
    }

    /**
     * @param mixed $committedBandwidthRaw
     * @return Port
     */
    public function setCommittedBandwidthRaw($committedBandwidthRaw)
    {
        $this->committedBandwidthRaw = $committedBandwidthRaw;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRemainingBandwidth()
    {
        return $this->remainingBandwidth;
    }

    /**
     * @param mixed $remainingBandwidth
     * @return Port
     */
    public function setRemainingBandwidth($remainingBandwidth)
    {
        $this->remainingBandwidth = $remainingBandwidth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRemainingBandwidthRaw()
    {
        return $this->remainingBandwidthRaw;
    }

    /**
     * @param mixed $remainingBandwidthRaw
     * @return Port
     */
    public function setRemainingBandwidthRaw($remainingBandwidthRaw)
    {
        $this->remainingBandwidthRaw = $remainingBandwidthRaw;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtilisation()
    {
        return $this->utilisation;
    }

    /**
     * @param mixed $utilisation
     * @return Port
     */
    public function setUtilisation($utilisation)
    {
        $this->utilisation = $utilisation;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtilisationRaw()
    {
        return $this->utilisationRaw;
    }

    /**
     * @param mixed $utilisationRaw
     * @return Port
     */
    public function setUtilisationRaw($utilisationRaw)
    {
        $this->utilisationRaw = $utilisationRaw;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     * @return Port
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $customerId
     * @return Port
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOdfPosition()
    {
        return $this->odfPosition;
    }

    /**
     * @param mixed $odfPosition
     * @return Port
     */
    public function setOdfPosition($odfPosition)
    {
        $this->odfPosition = $odfPosition;
        return $this;
    }
}
