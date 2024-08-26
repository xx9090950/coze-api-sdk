<?php

namespace Gongruixiang\CozeApiSdk\proxy\auth;

/**
 * 根据配置获取同步的授权方式
 */
class AuthorizationFactory
{
    public function getInstance()
    {
        $type = config('coze.authorization.type');
        switch ($type) {
            case AuthorizationTypeEnum::JWT_TOKEN:
                return new JwtToken();
            case AuthorizationTypeEnum::PERSONAL_TOKEN:
                return new PersonalToken();
            default:
                throw new \Exception('未找到授权方式');
        }
    }
}