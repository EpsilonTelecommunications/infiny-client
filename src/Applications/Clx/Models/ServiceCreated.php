<?php
/**
 * User: Russell Galpin <russ@7d-digital.co.uk>
 * Date: 16/10/2018
 * Time: 17:05
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class ServiceCreated extends BaseResponse
{
    private $serviceId;
    private $message;

    /**
     * @return mixed
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }

    /**
     * @param mixed $serviceId
     * @return ServiceCreated
     */
    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return ServiceCreated
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
}