<?php
/**
 * User: Russell Galpin <russ@7d-digital.co.uk>
 * Date: 12/10/2018
 * Time: 14:13
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class ServiceTypes extends BaseResponse
{
    private $serviceTypes = [];

    /**
     * @return array
     */
    public function getServiceTypes(): array
    {
        return $this->serviceTypes;
    }

    /**
     * @param array $serviceTypes
     * @return ServiceTypes
     */
    public function setServiceTypes(array $serviceTypes): ServiceTypes
    {
        $this->serviceTypes = $serviceTypes;
        return $this;
    }

    public function addServiceType(ServiceType $serviceType)
    {
        $this->serviceTypes[] = $serviceType;
        return $this;
    }
}