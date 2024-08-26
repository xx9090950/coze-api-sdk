<?php

namespace Gongruixiang\CozeApiSdk\proxy\auth;

class PersonalToken implements Authorization
{

    public function getAuthHeader(): string
    {
        return config('coze.token');
    }
}