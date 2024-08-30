<?php

namespace Gongruixiang\CozeApiSdk\proxy\conversation;

use Gongruixiang\CozeApiSdk\proxy\auth\AuthorizationFactory;
use Gongruixiang\CozeApiSdk\proxy\auth\Config;
use Gongruixiang\CozeApiSdk\proxy\conversation\entry\CreateConversationReq;

abstract class  AbstractConversationProxyService
{
    protected $Authorization;

    public function __construct(Config $config)
    {
        $this->Authorization = AuthorizationFactory::getInstance($config);
    }


    /**
     * 创建会话
     * @return Object
     */
    public abstract function create(CreateConversationReq  $req): Object;


    /**
     * 查看会话
     * @return Object
     */
    public abstract function retrieve(): Object;
}