<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 11:53
 */

namespace Infiny\Client;


class BaseRequest implements \JsonSerializable
{
    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        $data = [];
        foreach($this as $key=>$value) {
            $data[$key] = $value;
        }
        return $data;
    }
}