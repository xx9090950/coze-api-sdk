<?php
namespace tests;
require_once __DIR__ . '/../vendor/autoload.php';
define("ROOT_PATH", dirname(__DIR__) . "/");
use Gongruixiang\CozeApiSdk\proxy\auth\AuthorizationFactory;
use Gongruixiang\CozeApiSdk\proxy\auth\AuthorizationTypeEnum;
use Gongruixiang\CozeApiSdk\proxy\auth\Config;
use Gongruixiang\CozeApiSdk\proxy\common\ICacheUtil;

class AuthorizationTest extends \PHPUnit\Framework\TestCase
{
    public function testGetInstance()
    {
        $config=new Config();
        $config->setPersonalToken('123');
        $config->setAuthType(AuthorizationTypeEnum::PERSONAL_TOKEN);
        $auth=AuthorizationFactory::getInstance($config);
        $authHeader=$auth->getAuthHeader();
        $this->assertNotEmpty($authHeader);

        $config->setPrivateKey(file_get_contents("./private_key.pem"));
        $config->setIss('**');
        $config->setKid('**');
        $config->setAuthType(AuthorizationTypeEnum::JWT_TOKEN);
        $config->setCacheUtil($this->createMock(ICacheUtil::class));
        $auth=AuthorizationFactory::getInstance($config);
        $authHeader=$auth->getAuthHeader();
        $this->assertNotEmpty($authHeader);
    }
}