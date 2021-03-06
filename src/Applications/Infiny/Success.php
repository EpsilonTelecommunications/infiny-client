<?php
/**
 * User: Russell Galpin <russ@7d-digital.co.uk>
 * Date: 16/10/2018
 * Time: 09:59
 */

namespace Infiny\Applications\Infiny;


use Infiny\Client\BaseResponse;

class Success extends BaseResponse
{
    private $success;
    private $message;

    /**
     * @return mixed
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @param mixed $success
     * @return Success
     */
    public function setSuccess($success)
    {
        $this->succes = $success;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return Success
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
}