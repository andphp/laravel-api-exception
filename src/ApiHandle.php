<?php


namespace AndPHP\LaravelApiException;

use Illuminate\Foundation\Exceptions\Handler;
use Throwable;

class ApiHandle extends Handler
{
    protected $code = 503;
    protected $errorCode = 9999;
    protected $msg = 'System unknown error!';
    protected $data = [];

    public function render($request, Throwable $e)
    {
        $appDebug = config('app.debug', false);

        // 添加自定义异常处理机制
        if ($e instanceof ApiException) {
            $this->code = $e->getCode();
            $this->errorCode = $e->getErrorCode();
            $this->msg = $e->getMessage();
            $this->data = $e->getErrorData();
        } elseif ($appDebug) {
            return parent::render($request, $e);
        }

        $return_type = $request->input('format');

        if ($return_type === 'json') {
            $data = empty($this->data) ? [
                'describe' => config('error_code.' . $this->errorCode,$this->msg)
            ] : $this->data;
            return Output::outJson($data, $this->msg, $this->errorCode, $this->code);
        } else {
            return parent::render($request, $e);
        }
    }
}
