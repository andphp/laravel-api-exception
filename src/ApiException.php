<?php


namespace AndPHP;

use Exception;

class ApiException extends Exception
{
    protected $code = 503;
    protected $errorCode = 9999;
    protected $message = 'System unknown error!';
    protected $data = [];

    public function __construct(array $params = [])
    {
        if (array_key_exists('data', $params)) {
            $this->data = $params['data'];
        }
        if (array_key_exists('code', $params)) {
            $this->code = $params['code'];
        }
        if (array_key_exists('message', $params)) {
            $this->message = $params['message'];
        }
        if (array_key_exists('errorCode', $params)) {
            $this->errorCode = $params['errorCode'];
        }
        parent::__construct($this->message, $this->code);
    }

    final public function getErrorCode()
    {
        return $this->errorCode;
    }

    final public function getErrorData()
    {
        return $this->data;
    }
}
