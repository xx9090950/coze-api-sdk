<?php

namespace Gongruixiang\CozeApiSdk\proxy\conversation;

use Gongruixiang\CozeApiSdk\proxy\common\BaseUrlConstants;
use Gongruixiang\CozeApiSdk\proxy\common\CozeException;
use Gongruixiang\CozeApiSdk\proxy\conversation\entry\CreateConversationReq;
use GuzzleHttp\Client;

class ConversationProxyService extends AbstractConversationProxyService
{

    const CREATE_API=BaseUrlConstants::BASE_URL."v1/conversation/create";
    /**
     * @inheritDoc
     */
    public function create(CreateConversationReq  $req):Object
    {
        $client=new Client();
        $response=$client->post(
            self::CREATE_API,
            [
                'headers'=>[
                    'Authorization'=>"Bearer ".$this->Authorization->getAuthHeader()
                ],
                'json'=>$req
            ]
        );
        if ($response->getStatusCode()!=200) {
            throw new CozeException("-1","请求接口失败");
        }
        $response=json_decode($response->getBody()->getContents());
        if ($response->code!=0) {
            throw new CozeException($response->code,$response->message);
        }
        return $response;

    }

    /**
     * @inheritDoc
     */
    public function retrieve(): object
    {
        return json_decode("{}");
    }
}