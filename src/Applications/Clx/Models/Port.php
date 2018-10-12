<?php
/**
 * User: russ
 * Date: 12/10/2018
 * Time: 09:11
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class Port extends BaseResponse
{
    private $id;
    private $ref;
    private $name;
    private $datacentreName;
    private $datacentre;
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
    private $regions = [];
    private $slot;
    private $shelf;
    private $shelfType;
    private $networkAlarms = [];
    private $services = [];
    private $serviceType;
    private $serviceCount;
    private $singleUse;
    private $offnetSupplierRef;
    private $offnetSupplierRefDisplay;
    private $offnetServiceRef;
    private $offnetServiceRefDisplay;
    private $serviceTown;
    private $userCanAccess;
    private $datacentreDatacentreName;
    private $datacentreLogo;
    private $datacentreCity;
    private $datacentreCityIso;
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
     * @return Datacentre
     */
    public function getDatacentre(): Datacentre
    {
        return $this->datacentre;
    }

    /**
     * @param Datacentre $datacentre
     * @return Port
     */
    public function setDatacentre(Datacentre $datacentre)
    {
        $this->datacentre = $datacentre;
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

    /**
     * @return array
     */
    public function getRegions(): array
    {
        return $this->regions;
    }

    /**
     * @param array $regions
     * @return Port
     */
    public function setRegions(array $regions): Port
    {
        $this->regions = $regions;
        return $this;
    }

    /**
     * @param Region $region
     * @return $this
     */
    public function addRegion(Region $region)
    {
        $this->regions[] = $region;
        return $this;
    }

    /**
     * @return Slot
     */
    public function getSlot(): Slot
    {
        return $this->slot;
    }

    /**
     * @param Slot $slot
     * @return Port
     */
    public function setSlot(Slot $slot)
    {
        $this->slot = $slot;
        return $this;
    }

    /**
     * @return Shelf
     */
    public function getShelf(): Shelf
    {
        return $this->shelf;
    }

    /**
     * @param Shelf $shelf
     * @return Port
     */
    public function setShelf(Shelf $shelf)
    {
        $this->shelf = $shelf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getShelfType()
    {
        return $this->shelfType;
    }

    /**
     * @param mixed $shelfType
     * @return Port
     */
    public function setShelfType($shelfType)
    {
        $this->shelfType = $shelfType;
        return $this;
    }

    /**
     * @return array
     */
    public function getNetworkAlarms(): array
    {
        return $this->networkAlarms;
    }

    /**
     * @param array $networkAlarms
     * @return Port
     */
    public function setNetworkAlarms(array $networkAlarms): Port
    {
        $this->networkAlarms = $networkAlarms;
        return $this;
    }

    /**
     * @param NetworkAlarm $networkAlarm
     * @return $this
     */
    public function addNetworkAlarm(NetworkAlarm $networkAlarm)
    {
        $this->networkAlarms[] = $networkAlarm;
        return $this;
    }

    /**
     * @return array
     */
    public function getServices(): array
    {
        return $this->services;
    }

    /**
     * @param array $services
     * @return Port
     */
    public function setServices(array $services): Port
    {
        $this->services = $services;
        return $this;
    }

    /**
     * @param Service $service
     * @return $this
     */
    public function addService(Service $service)
    {
        $this->services[] = $service;
        return $this;
    }

    /**
     * @return ServiceType
     */
    public function getServiceType(): ServiceType
    {
        return $this->serviceType;
    }

    /**
     * @param ServiceType $serviceType
     * @return Port
     */
    public function setServiceType(ServiceType $serviceType)
    {
        $this->serviceType = $serviceType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getServiceCount()
    {
        return $this->serviceCount;
    }

    /**
     * @param mixed $serviceCount
     * @return Port
     */
    public function setServiceCount($serviceCount)
    {
        $this->serviceCount = $serviceCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSingleUse()
    {
        return $this->singleUse;
    }

    /**
     * @param mixed $singleUse
     * @return Port
     */
    public function setSingleUse($singleUse)
    {
        $this->singleUse = $singleUse;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOffnetSupplierRef()
    {
        return $this->offnetSupplierRef;
    }

    /**
     * @param mixed $offnetSupplierRef
     * @return Port
     */
    public function setOffnetSupplierRef($offnetSupplierRef)
    {
        $this->offnetSupplierRef = $offnetSupplierRef;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOffnetSupplierRefDisplay()
    {
        return $this->offnetSupplierRefDisplay;
    }

    /**
     * @param mixed $offnetSupplierRefDisplay
     * @return Port
     */
    public function setOffnetSupplierRefDisplay($offnetSupplierRefDisplay)
    {
        $this->offnetSupplierRefDisplay = $offnetSupplierRefDisplay;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOffnetServiceRef()
    {
        return $this->offnetServiceRef;
    }

    /**
     * @param mixed $offnetServiceRef
     * @return Port
     */
    public function setOffnetServiceRef($offnetServiceRef)
    {
        $this->offnetServiceRef = $offnetServiceRef;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOffnetServiceRefDisplay()
    {
        return $this->offnetServiceRefDisplay;
    }

    /**
     * @param mixed $offnetServiceRefDisplay
     * @return Port
     */
    public function setOffnetServiceRefDisplay($offnetServiceRefDisplay)
    {
        $this->offnetServiceRefDisplay = $offnetServiceRefDisplay;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getServiceTown()
    {
        return $this->serviceTown;
    }

    /**
     * @param mixed $serviceTown
     * @return Port
     */
    public function setServiceTown($serviceTown)
    {
        $this->serviceTown = $serviceTown;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserCanAccess()
    {
        return $this->userCanAccess;
    }

    /**
     * @param mixed $userCanAccess
     * @return Port
     */
    public function setUserCanAccess($userCanAccess)
    {
        $this->userCanAccess = $userCanAccess;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDatacentreDatacentreName()
    {
        return $this->datacentreDatacentreName;
    }

    /**
     * @param mixed $datacentreDatacentreName
     * @return Port
     */
    public function setDatacentreDatacentreName($datacentreDatacentreName)
    {
        $this->datacentreDatacentreName = $datacentreDatacentreName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDatacentreLogo()
    {
        return $this->datacentreLogo;
    }

    /**
     * @param mixed $datacentreLogo
     * @return Port
     */
    public function setDatacentreLogo($datacentreLogo)
    {
        $this->datacentreLogo = $datacentreLogo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDatacentreCity()
    {
        return $this->datacentreCity;
    }

    /**
     * @param mixed $datacentreCity
     * @return Port
     */
    public function setDatacentreCity($datacentreCity)
    {
        $this->datacentreCity = $datacentreCity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDatacentreCityIso()
    {
        return $this->datacentreCityIso;
    }

    /**
     * @param mixed $datacentreCityIso
     * @return Port
     */
    public function setDatacentreCityIso($datacentreCityIso)
    {
        $this->datacentreCityIso = $datacentreCityIso;
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
     * @return Port
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}
