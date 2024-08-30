<?php

namespace tests;

require_once __DIR__ . '/../vendor/autoload.php';
define("ROOT_PATH", dirname(__DIR__) . "/");
use Gongruixiang\CozeApiSdk\proxy\auth\AuthorizationTypeEnum;
use Gongruixiang\CozeApiSdk\proxy\auth\Config;
use Gongruixiang\CozeApiSdk\proxy\common\ICacheUtil;
use Gongruixiang\CozeApiSdk\proxy\conversation\ConversationProxyService;
use Gongruixiang\CozeApiSdk\proxy\conversation\entry\CreateConversationReq;


class ConversationTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $config = new Config();
        $config->setPrivateKey(file_get_contents("./private_key.pem"));
        $config->setIss('**');
        $config->setKid('**');
        $config->setAuthType(AuthorizationTypeEnum::JWT_TOKEN);
        $config->setCacheUtil($this->createMock(ICacheUtil::class));

        $req = new CreateConversationReq();
        $req->role="user";
        $req->content="你好";
        $req->content_type="text";
        $response=(new ConversationProxyService($config))->create($req);
        $this->assertTrue($response->code==0);
    }
}