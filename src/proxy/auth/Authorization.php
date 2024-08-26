<?php

namespace Gongruixiang\CozeApiSdk\proxy\auth;

interface Authorization
{
    public function getAuthHeader(): string;
}