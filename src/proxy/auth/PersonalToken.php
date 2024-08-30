<?php

namespace Gongruixiang\CozeApiSdk\proxy\auth;

class PersonalToken implements Authorization
{
    private $config;
    public function __construct(Config $config)
    {
        $this->config=$config;
    }

    public function getAuthHeader(): string
    {
        return $this->config->getPersonalToken();
    }
}