<?php
/**
 * User: russ
 * Date: 16/10/2018
 * Time: 10:50
 */

namespace Infiny\Applications\Clx\Requests;


use Infiny\Client\BaseRequest;

class Service extends BaseRequest
{
    private $name;
    private $portId;
    private $servicePortId;
    private $productId;
    private $vlan;
    private $farEndPortId;
    private $cvlanMappingType;
    private $vlans = [];
    private $vlanFrom;
    private $vlanTo;
    private $translatedVlan;
    private $untaggedPortId;
    private $awsAccount;
    private $msaServiceKey;
    private $secondaryPortId;
    private $gcpProjectId;
    private $hostIp;
    private $linkIp;
    private $asn;
    private $md5SessionKey;
    private $contactName;
    private $contactEmail;
    private $contactPhone;
    private $disableAutoRenew = false;

    private $serviceType;

    /**
     * @return mixed
     */
    public function getRequestData()
    {
        $request = [
            'name' => $this->getName(),
            'port_id' => $this->getPortId(),
            'product_id' => $this->getProductId(),
            'disable_auto_renew' => $this->isDisableAutoRenew()
        ];

        switch($this->getServiceType()) {
            case 'INT':
                $request['far_end_port_id'] = $this->getFarEndPortId();
                $request['cvlan_mapping_type'] = $this->getCvlanMappingType();
                switch($this->getCvlanMappingType()) {
                    case 'bundled':
                        $request['cvlans'] = $this->getVlans();
                    break;
                    case 'range':
                        $request['vlan_from'] = $this->getVlanFrom();
                        $request['vlan_to'] = $this->getVlanTo();
                    break;
                    case 'translation':
                        $request['vlan'] = $this->getVlan();
                        $request['translated_vlan'] = $this->getTranslatedVlan();
                    break;
                    case 'virtual-untagged':
                        $request['vlan'] = $this->getVlan();
                        $request['untagged_port_id'] = $this->getUntaggedPortId();
                    break;
                }
            break;
            case 'AWS':
                $request['aws_account'] = $this->getAwsAccount();
            break;
            case 'MSA':
                $request['msa_service_key'] = $this->getMasServiceKey();
                $request['secondary_port_id'] = $this->getSecondaruPortId();
            break;
            case 'GCP':
                $request['gcp_project_id'] = $this->getGcpProjectId();
                $request['host_ip'] = $this->getHostIp();
                $request['link_ip'] = $this->getLinkIp();
                $request['asn'] = $this->getAsn();
                $request['md5_session_key'] = $this->getMd5SessionKey();
                $request['contact_name'] = $this->getContactName();
                $request['contact_email'] = $this->getContactEmail();
                $request['contact_phone'] = $this->getContactPhone();
        }

        return $request;
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

    /**
     * @return mixed
     */
    public function getPortId()
    {
        return $this->portId;
    }

    /**
     * @param mixed $portId
     * @return Service
     */
    public function setPortId($portId)
    {
        $this->portId = $portId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getServicePortId()
    {
        return $this->servicePortId;
    }

    /**
     * @param mixed $servicePortId
     * @return Service
     */
    public function setServicePortId($servicePortId)
    {
        $this->servicePortId = $servicePortId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed $productId
     * @return Service
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
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
    public function getFarEndPortId()
    {
        return $this->farEndPortId;
    }

    /**
     * @param mixed $farEndPortId
     * @return Service
     */
    public function setFarEndPortId($farEndPortId)
    {
        $this->farEndPortId = $farEndPortId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCvlanMappingType()
    {
        return $this->cvlanMappingType;
    }

    /**
     * @param mixed $cvlanMappingType
     * @return Service
     */
    public function setCvlanMappingType($cvlanMappingType)
    {
        $this->cvlanMappingType = $cvlanMappingType;
        return $this;
    }

    /**
     * @return array
     */
    public function getVlans(): array
    {
        return $this->vlans;
    }

    /**
     * @param array $vlans
     * @return Service
     */
    public function setVlans(array $vlans): Service
    {
        $this->vlans = $vlans;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVlanFrom()
    {
        return $this->vlanFrom;
    }

    /**
     * @param mixed $vlanFrom
     * @return Service
     */
    public function setVlanFrom($vlanFrom)
    {
        $this->vlanFrom = $vlanFrom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVlanTo()
    {
        return $this->vlanTo;
    }

    /**
     * @param mixed $vlanTo
     * @return Service
     */
    public function setVlanTo($vlanTo)
    {
        $this->vlanTo = $vlanTo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTranslatedVlan()
    {
        return $this->translatedVlan;
    }

    /**
     * @param mixed $translatedVlan
     * @return Service
     */
    public function setTranslatedVlan($translatedVlan)
    {
        $this->translatedVlan = $translatedVlan;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUntaggedPortId()
    {
        return $this->untaggedPortId;
    }

    /**
     * @param mixed $untaggedPortId
     * @return Service
     */
    public function setUntaggedPortId($untaggedPortId)
    {
        $this->untaggedPortId = $untaggedPortId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAwsAccount()
    {
        return $this->awsAccount;
    }

    /**
     * @param mixed $awsAccount
     * @return Service
     */
    public function setAwsAccount($awsAccount)
    {
        $this->awsAccount = $awsAccount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMsaServiceKey()
    {
        return $this->msaServiceKey;
    }

    /**
     * @param mixed $msaServiceKey
     * @return Service
     */
    public function setMsaServiceKey($msaServiceKey)
    {
        $this->msaServiceKey = $msaServiceKey;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecondaryPortId()
    {
        return $this->secondaryPortId;
    }

    /**
     * @param mixed $secondaryPortId
     * @return Service
     */
    public function setSecondaryPortId($secondaryPortId)
    {
        $this->secondaryPortId = $secondaryPortId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGcpProjectId()
    {
        return $this->gcpProjectId;
    }

    /**
     * @param mixed $gcpProjectId
     * @return Service
     */
    public function setGcpProjectId($gcpProjectId)
    {
        $this->gcpProjectId = $gcpProjectId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHostIp()
    {
        return $this->hostIp;
    }

    /**
     * @param mixed $hostIp
     * @return Service
     */
    public function setHostIp($hostIp)
    {
        $this->hostIp = $hostIp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLinkIp()
    {
        return $this->linkIp;
    }

    /**
     * @param mixed $linkIp
     * @return Service
     */
    public function setLinkIp($linkIp)
    {
        $this->linkIp = $linkIp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAsn()
    {
        return $this->asn;
    }

    /**
     * @param mixed $asn
     * @return Service
     */
    public function setAsn($asn)
    {
        $this->asn = $asn;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMd5SessionKey()
    {
        return $this->md5SessionKey;
    }

    /**
     * @param mixed $md5SessionKey
     * @return Service
     */
    public function setMd5SessionKey($md5SessionKey)
    {
        $this->md5SessionKey = $md5SessionKey;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * @param mixed $contactName
     * @return Service
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * @param mixed $contactEmail
     * @return Service
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactPhone()
    {
        return $this->contactPhone;
    }

    /**
     * @param mixed $contactPhone
     * @return Service
     */
    public function setContactPhone($contactPhone)
    {
        $this->contactPhone = $contactPhone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }

    /**
     * @param mixed $serviceType
     * @return Service
     */
    public function setServiceType($serviceType)
    {
        $this->serviceType = $serviceType;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDisableAutoRenew(): bool
    {
        return $this->disableAutoRenew;
    }

    /**
     * @param bool $disableAutoRenew
     * @return Service
     */
    public function setDisableAutoRenew(bool $disableAutoRenew): Service
    {
        $this->disableAutoRenew = $disableAutoRenew;
        return $this;
    }
}