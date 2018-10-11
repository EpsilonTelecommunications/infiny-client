<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 13:50
 */

namespace Infiny;

use Infiny\Applications\Clx\Models\Service;
use Infiny\Client\Client as InfinyClient;


class CloudLx
{
    private $client;

    public function __construct($clientId, $clientSecret)
    {
        $this->client = new InfinyClient();
        $this->client->setClientId($clientId)
            ->setClientSecret($clientSecret);
    }

    /**
     * @return Service[]
     */
    public function getServices()
    {
        return $this->client->get('services')->getServices();
    }

    public function getService($serviceId)
    {
        return $this->client->get(sprintf('services/{%d}/service', intval($serviceId)));
    }
}