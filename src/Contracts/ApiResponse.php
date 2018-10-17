<?php
/**
 * User: Russell Galpin <russ@7d-digital.co.uk>
 * Date: 11/10/2018
 * Time: 09:29
 */

namespace Infiny\Contracts;


interface ApiResponse
{
    public function getBody() : \stdClass;
}