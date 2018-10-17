<?php
/**
 * User: Russell Galpin <russ@7d-digital.co.uk>
 * Date: 12/10/2018
 * Time: 09:46
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class Slot extends BaseResponse
{
    private $index;

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param mixed $index
     * @return Slot
     */
    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }
}