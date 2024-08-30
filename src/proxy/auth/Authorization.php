<?php

namespace Gongruixiang\CozeApiSdk\proxy\auth;

interface Authorization
{
    public function __construct(Config $config);

    public function getAuthHeader(): string;
}