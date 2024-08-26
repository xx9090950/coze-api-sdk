<?php

namespace Gongruixiang\CozeApiSdk\proxy\auth;

use Firebase\JWT\JWT;
use Gongruixiang\CozeApiSdk\proxy\auth\Authorization;

class JwtToken implements Authorization
{

    public function getAuthHeader(): string
    {
        $jsonHeader=[
            'alg'=>'RS256',
            'typ'=>'JWT',
            'kid'=>config('coze.kid')
        ];
        $baseHeader=base64_encode(json_encode($jsonHeader));

        $jsonPayload=[
            'iss'=>config('coze.iss'),
            'aud'=>'api.coze.cn',
            'iat'=>time(),
            'exp'=>time()+3600,
            'jti'=>uniqid()
        ];
        $basePayload=base64_encode(json_encode($jsonPayload));
        $signature=JWT::encode($baseHeader.".".$basePayload,config('coze.private_key'),'RS256');
        return  $baseHeader.".".$basePayload.".".$signature;
    }
}