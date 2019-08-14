<?php
/**
 * Copyright (c) 2019. Zhang Di <zhangdi_me@163.com>
 */

namespace ZhangDi\Sdk\DingTalk\Robot;


use ZhangDi\SdkKernel\BaseClient;

class Client extends BaseClient
{
    protected $baseUri = 'https://oapi.dingtalk.com';

    public function sendText(string $text)
    {
        return $this->request('POST', '/robot/send', [
            'json' => [
                "msgtype" => "text",
                'text' => [
                    'content' => $text,
                ]
            ]
        ]);
    }
}