<?php

namespace Gongruixiang\CozeApiSdk\proxy\auth;

use Gongruixiang\CozeApiSdk\proxy\common\ICacheUtil;

class Config
{
    private $kid;

    private $iss;

    private $personalToken;

    private $privateKey;

    /**
     * @var string 认证方式，默认jwtToken
     */
    private $authType = AuthorizationTypeEnum::JWT_TOKEN;


    private $cacheUtil;

    /**
     * @return mixed
     */
    public function getKid()
    {
        return $this->kid;
    }

    /**
     * @param mixed $kid
     */
    public function setKid($kid): void
    {
        $this->kid = $kid;
    }

    /**
     * @return mixed
     */
    public function getIss()
    {
        return $this->iss;
    }

    /**
     * @param mixed $iss
     */
    public function setIss($iss): void
    {
        $this->iss = $iss;
    }

    /**
     * @return mixed
     */
    public function getPersonalToken()
    {
        return $this->personalToken;
    }

    /**
     * @param mixed $personalToken
     */
    public function setPersonalToken($personalToken): void
    {
        $this->personalToken = $personalToken;
    }

    public function getAuthType(): string
    {
        return $this->authType;
    }

    public function setAuthType(string $authType): void
    {
        $this->authType = $authType;
    }

    /**
     * @return mixed
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @param mixed $privateKey
     */
    public function setPrivateKey($privateKey): void
    {
        $this->privateKey = $privateKey;
    }

    /**
     * @return mixed
     */
    public function getCacheUtil():ICacheUtil
    {
        return $this->cacheUtil;
    }

    /**
     * @param mixed $cacheUtil
     */
    public function setCacheUtil(ICacheUtil $cacheUtil): void
    {
        $this->cacheUtil = $cacheUtil;
    }






}