<?php
/**
 * User: Russell Galpin <russ@7d-digital.co.uk>
 * Date: 12/10/2018
 * Time: 09:48
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class NetworkAlarm extends BaseResponse
{
    private $description;
    private $createdAt;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return NetworkAlarm
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return NetworkAlarm
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}