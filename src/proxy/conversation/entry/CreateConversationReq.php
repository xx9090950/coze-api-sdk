<?php

namespace Gongruixiang\CozeApiSdk\proxy\conversation\entry;

class CreateConversationReq
{

    /**
     * {
     * "role": "user",
     * "content": "搜几个最新的军事新闻",
     * "content_type": "text"
     * }
 */
    public $role;

    public $content;
    public $content_type;
}