<?php

namespace Gongruixiang\CozeApiSdk\proxy\common;

class CozeException extends \Exception
{
    public $code;
    public $msg;
    public function __construct($code,$msg)
    {
        parent::__construct();
        $this->msg=$msg;
        $this->code=$code;
    }
}