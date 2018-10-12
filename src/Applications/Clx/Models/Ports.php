<?php
/**
 * User: russ
 * Date: 12/10/2018
 * Time: 10:06
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class Ports extends BaseResponse
{
    private $ports = [];

    /**
     * @return Port[]
     */
    public function getPorts(): array
    {
        return $this->ports;
    }

    /**
     * @param Port[] $ports
     * @return Ports
     */
    public function setPorts(array $ports): Ports
    {
        $this->ports = $ports;
        return $this;
    }

    /**
     * @param Port $port
     * @return $this
     */
    public function addPort(Port $port)
    {
        $this->ports[] = $port;
        return $this;
    }
}