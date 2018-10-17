<?php
/**
 * User: Russell Galpin <russ@7d-digital.co.uk>
 * Date: 11/10/2018
 * Time: 13:50
 */

namespace Infiny;

use Infiny\Applications\Clx\Models\Service;
use Infiny\Applications\Clx\Requests\Service as ServiceRequest;
use Infiny\Applications\Clx\Requests\UpdateServiceRenewal;
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

    public function getAvailablePorts($datacentreId = null, $cityId = null, $continentId = null, $serviceType = null)
    {
        return $this->client->get('services/ports-available', [
            'datacentre_id' => $datacentreId,
            'city_id' => $cityId,
            'continent_id' => $continentId,
            'service_type' => $serviceType
        ])->getPorts();
    }

    public function getServicePricing($portA, $portB, $protected = 0)
    {
        return $this->client->get('services/pricing', [
            'port_id' => $portA,
            'service_port_id' => $portB,
            'protected' => $protected
        ])->getProducts();
    }

    public function getAvailableVlans($portA, $portB, $secondaryPort = null)
    {
        return $this->client->get('services/available-vlans', [
            'port_id' => $portA,
            'service_port_id' => $portB,
            'secondary_port_id' => $secondaryPort
        ])->getVlans();
    }

    public function getServiceTypes()
    {
        return $this->client->get('services/types')->getServiceTypes();
    }

    public function updateServiceRenewal($serviceId, $renewalProductId = null, $enableAutoRenewal = true)
    {
        $updateServiceRenewalRequest = new UpdateServiceRenewal();
        $updateServiceRenewalRequest->setEnableAutoRenewal($enableAutoRenewal)
            ->setRenewalProductId($renewalProductId);

        return $this->client->put(sprintf('services/{%d}/service/renew', $serviceId), $updateServiceRenewalRequest);
    }

    public function getPurchasablePorts($datacentreId = null, $cityId = null, $continentId = null)
    {
        return $this->client->get('ports/available', [
            'datacentre_id' => $datacentreId,
            'city_id' => $cityId,
            'continent_id' => $continentId
        ])->getPorts();
    }

    public function getServiceGraph($serviceId, $graphType)
    {
        return $this->client->get(sprintf('services/{%d}/graph/{%s}', $serviceId, $graphType));
    }

    public function createPortToPortVlanBundledService($name, $portId, $farEndPortId, $productId, array $vlans, $disableAutoRenew = false)
    {
        $service = new ServiceRequest();
        $service->setServiceType('INT')
            ->setName($name)
            ->setPortId($portId)
            ->setFarEndPortId($farEndPortId)
            ->setProductId($productId)
            ->setVlans($vlans)
            ->setDisableAutoRenew($disableAutoRenew);

        return $this->client->post('services/create', $service);
    }

    public function createPortToPortVlanRangeService($name, $portId, $farEndPortId, $productId, $vlanFrom, $vlanTo, $disableAutoRenew = false)
    {
        $service = new ServiceRequest();
        $service->setServiceType('INT')
            ->setName($name)
            ->setPortId($portId)
            ->setFarEndPortId($farEndPortId)
            ->setProductId($productId)
            ->setVlanFrom($vlanFrom)
            ->setVlanTo($vlanTo)
            ->setDisableAutoRenew($disableAutoRenew);

        return $this->client->post('services/create', $service);
    }

    public function createPortToPortVlanTranslationService($name, $portId, $farEndPortId, $productId, $vlan, $translatedVlan, $disableAutoRenew = false)
    {
        $service = new ServiceRequest();
        $service->setServiceType('INT')
            ->setName($name)
            ->setPortId($portId)
            ->setFarEndPortId($farEndPortId)
            ->setProductId($productId)
            ->setVlan($vlan)
            ->setTranslatedVlan($translatedVlan)
            ->setDisableAutoRenew($disableAutoRenew);

        return $this->client->post('services/create', $service);
    }

    public function createPortToPortVirtualUntaggedService($name, $portId, $farEndPortId, $productId, $vlan, $untaggedPortId, $disableAutoRenew = false)
    {
        $service = new ServiceRequest();
        $service->setServiceType('INT')
            ->setName($name)
            ->setPortId($portId)
            ->setFarEndPortId($farEndPortId)
            ->setProductId($productId)
            ->setVlan($vlan)
            ->setUntaggedPortId($untaggedPortId)
            ->setDisableAutoRenew($disableAutoRenew);

        return $this->client->post('services/create', $service);
    }

    public function createAwsService($name, $portId, $servicePortId, $productId, $vlan, $awsAccount, $disableAutoRenew = false)
    {
        $service = new ServiceRequest();
        $service->setServiceType('AWS')
            ->setName($name)
            ->setPortId($portId)
            ->setServicePortId($servicePortId)
            ->setProductId($productId)
            ->setVlan($vlan)
            ->setAwsAccount($awsAccount)
            ->setDisableAutoRenew($disableAutoRenew);

        return $this->client->post('services/create', $service);
    }

    public function createAzureService($name,
                                       $portId,
                                       $servicePortId,
                                       $productId,
                                       $vlan,
                                       $azureServiceKey,
                                       $secondaryPortId,
                                       $disableAutoRenew = false)
    {
        $service = new ServiceRequest();
        $service->setServiceType('MSA')
            ->setName($name)
            ->setPortId($portId)
            ->setServicePortId($servicePortId)
            ->setProductId($productId)
            ->setVlan($vlan)
            ->setMsaServiceKey($azureServiceKey)
            ->setSecondaryPortId($secondaryPortId)
            ->setDisableAutoRenew($disableAutoRenew);

        return $this->client->post('services/create', $service);
    }

    public function createGoogleService($name,
                                        $portId,
                                        $servicePortId,
                                        $productId,
                                        $vlan,
                                        $gcpProjectId,
                                        $hostIp,
                                        $linkIp,
                                        $asn,
                                        $md5SessionKey,
                                        $contactName,
                                        $contactEmail,
                                        $contactPhone,
                                        $disableAutoRenew = false)
    {
        $service = new ServiceRequest();
        $service->setServiceType('GCP')
            ->setName($name)
            ->setPortId($portId)
            ->setServicePortId($servicePortId)
            ->setProductId($productId)
            ->setVlan($vlan)
            ->setGcpProjectId($gcpProjectId)
            ->setHostIp($hostIp)
            ->setLinkIp($linkIp)
            ->setAsn($asn)
            ->setMd5SessionKey($md5SessionKey)
            ->setContactName($contactName)
            ->setContactEmail($contactEmail)
            ->setContactPhone($contactPhone)
            ->setDisableAutoRenew($disableAutoRenew);

        return $this->client->post('services/create', $service);
    }

    public function getPorts()
    {
        return $this->client->get('ports')->getPorts();
    }

    public function getPort($portId)
    {
        return $this->client->get(sprintf('ports/{%d}/port', intval($portId)));
    }

}