<?php

namespace Gongruixiang\CozeApiSdk\proxy\common;

/**
 * 使用者需自行实现缓存方法
 */
interface ICacheUtil
{
    public function get($key):string;

    public function has($key):bool;

    public function set($key,$value,$expire=3600):bool;
}