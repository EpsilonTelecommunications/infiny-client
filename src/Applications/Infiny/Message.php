<?php
/**
 * User: russ
 * Date: 16/10/2018
 * Time: 10:00
 */

namespace Infiny\Infiny;


use Infiny\Client\BaseResponse;

class Message extends BaseResponse
{
    private $value;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return Message
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}