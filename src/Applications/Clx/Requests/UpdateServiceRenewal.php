<?php
/**
 * User: Russell Galpin <russ@7d-digital.co.uk>
 * Date: 16/10/2018
 * Time: 09:37
 */

namespace Infiny\Applications\Clx\Requests;


use Infiny\Client\BaseRequest;

class UpdateServiceRenewal extends BaseRequest
{
    private $enableAutoRenewal = true;
    private $renewalProductId;

    /**
     * @return bool
     */
    public function isEnableAutoRenewal(): bool
    {
        return $this->enableAutoRenewal;
    }

    /**
     * @param bool $enableAutoRenewal
     * @return UpdateServiceRenewal
     */
    public function setEnableAutoRenewal(bool $enableAutoRenewal): UpdateServiceRenewal
    {
        $this->enableAutoRenewal = $enableAutoRenewal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRenewalProductId()
    {
        return $this->renewalProductId;
    }

    /**
     * @param mixed $renewalProductId
     * @return UpdateServiceRenewal
     */
    public function setRenewalProductId($renewalProductId)
    {
        $this->renewalProductId = $renewalProductId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRequestData()
    {
        $request['disable_auto_renew'] = !$this->isEnableAutoRenewal();
        if($this->getRenewalProductId()) {
            $request['renewal_product_id'] = $this->getRenewalProductId();
        }
        return $request;
    }
}