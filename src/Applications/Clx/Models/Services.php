<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 13:55
 */

namespace Infiny\Applications\Clx\Models;

use Infiny\Client\BaseResponse;

class Services extends BaseResponse
{
    private $services = [];

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
     * @return array
     */
    public function getServices(): array
    {
        return $this->services;
    }

    /**
     * @param array $services
     * @return Services
     */
    public function setServices(array $services): Services
    {
        $this->services = $services;
        return $this;
    }


}