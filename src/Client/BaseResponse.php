<?php
/**
 * User: russ
 * Date: 11/10/2018
 * Time: 11:40
 */

namespace Infiny\Client;


use Infiny\Contracts\ApiResponse;
use Infiny\Contracts\BaseResponse as BaseResponseInterface;


class BaseResponse implements BaseResponseInterface
{
    public function __construct(ApiResponse $response)
    {
        foreach($response->getBody() as $key=>$value) {
            print $value;
        }
    }
}