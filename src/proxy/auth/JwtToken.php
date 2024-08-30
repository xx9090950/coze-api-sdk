<?php

namespace Gongruixiang\CozeApiSdk\proxy\auth;

use Firebase\JWT\JWT;
use Gongruixiang\CozeApiSdk\proxy\common\BaseUrlConstants;
use Gongruixiang\CozeApiSdk\proxy\common\CozeException;
use GuzzleHttp\Client;

class JwtToken implements Authorization
{
    private $config;

    const ACCESS_TOKEN_KEY_NAME='jwt_access_token_key_0830';

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function getAuthHeader(): string
    {
        //优先走缓存
        if ($this->config->getCacheUtil()->has(self::ACCESS_TOKEN_KEY_NAME)) {
            return $this->config->getCacheUtil()->get(self::ACCESS_TOKEN_KEY_NAME);
        }
        $jsonPayload = [
            'iss' => $this->config->getIss(),
            'aud' => 'api.coze.cn',
            'iat' => time(),
            'exp' => time() + 3600,
            'jti' => uniqid()
        ];
        $jwt = JWT::encode($jsonPayload, $this->config->getPrivateKey(), 'RS256',$this->config->getKid());

        $client = new Client();
        $response = $client->post(BaseUrlConstants::BASE_URL . "api/permission/oauth2/token",
            [
                'headers' => [
                    'Authorization' => "Bearer " . $jwt
                ],
                'json' => [
                    'duration_seconds' => 3600,
                    'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer'
                ]
            ]
        );
        if ($response->getStatusCode() != 200) {
            throw new CozeException("-1", "请求接口失败");
        }
        $response = json_decode($response->getBody()->getContents());
        if (property_exists($response,"error_code")) {
            throw new CozeException($response->error_code, $response->error_message);
        }
        //获取到token 后缓存起来
        $this->config->getCacheUtil()->set(self::ACCESS_TOKEN_KEY_NAME,$response->access_token, ($response->expires_in-60));
        return $response->access_token;
    }



}