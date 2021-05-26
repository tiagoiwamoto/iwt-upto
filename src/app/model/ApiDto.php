<?php
/**
 * Created by: tiago
 * Email: tiago.iwamoto@gmail.com
 * Linkedin: https://www.linkedin.com/in/tiago-iwamoto/
 * Created at: 15/05/2021 - 13:11
 */

namespace app\model;


use DateTime;

class ApiDto{

    private $code;
    private $message;
    private $details;
    private $timestamp;
    private $protocol;

    /**
     * ApiDto constructor.
     * @param $code
     * @param $message
     * @param $details
     */
    public function __construct($code, $message, $details){
        $this->code = $code;
        $this->message = $message;
        $this->details = $details;
        $this->protocol = md5(uniqid(rand(), true));
        $this->timestamp = new DateTime();
    }


    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     * @return ApiDto
     */
    public function setCode($code)
    {
        $this->code = $code;
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
     * @return ApiDto
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param mixed $details
     * @return ApiDto
     */
    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     * @return ApiDto
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param mixed $protocol
     * @return ApiDto
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

}
