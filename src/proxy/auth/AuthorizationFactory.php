<?php

namespace Gongruixiang\CozeApiSdk\proxy\auth;


/**
 * 根据配置获取同步的授权方式
 */
class AuthorizationFactory
{
    /**
     * @throws \Exception
     */
    public static function getInstance(Config $config)
    {
        self::checkParam($config);
        $type=$config->getAuthType();
        switch ($type) {
            case AuthorizationTypeEnum::JWT_TOKEN:
                return new JwtToken($config);
            case AuthorizationTypeEnum::PERSONAL_TOKEN:
                return new PersonalToken($config);
            default:
                throw new \Exception('未找到授权方式');
        }
    }

    /**
     * @param Config $config
     * @return void
     * @throws \Exception
     */
    private static function checkParam(Config  $config)
    {
        if ($config->getAuthType()==null) {
            throw new \Exception('未找到授权方式');
        }
        if ($config->getAuthType()==AuthorizationTypeEnum::JWT_TOKEN) {
            if (empty($config->getPrivateKey())||empty($config->getIss())||empty($config->getKid())) {
                throw new \Exception('JWT授权方式参数缺失');
            }
        }
        if ($config->getAuthType()==AuthorizationTypeEnum::PERSONAL_TOKEN) {
            if (empty($config->getPersonalToken())) {
                throw new \Exception('个人令牌授权方式参数缺失');
            }
        }
    }
}