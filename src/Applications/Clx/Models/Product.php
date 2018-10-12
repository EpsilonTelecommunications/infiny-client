<?php
/**
 * User: russ
 * Date: 12/10/2018
 * Time: 13:19
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class Product extends BaseResponse
{
    private $id;
    private $speed;
    private $periodLength;
    private $periodType;
    private $price;
    private $currency;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Product
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriodLength()
    {
        return $this->periodLength;
    }

    /**
     * @param mixed $periodLength
     * @return Product
     */
    public function setPeriodLength($periodLength)
    {
        $this->periodLength = $periodLength;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriodType()
    {
        return $this->periodType;
    }

    /**
     * @param mixed $periodType
     * @return Product
     */
    public function setPeriodType($periodType)
    {
        $this->periodType = $periodType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     * @return Product
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }
}