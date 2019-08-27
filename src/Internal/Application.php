<?php


namespace ZhangDi\Sdk\DingTalk\Internal;

use ZhangDi\Sdk\DingTalk\Robot\RobotServiceProvider;
use ZhangDi\SdkKernel\Application as BaseApplication;

class Application extends BaseApplication
{
    public $id = 'dingtalk-internal';
    public $name = '钉钉企业内部应用SDK';

    public $defaultConfig = [
        'http_client' => [
            'base_uri' => 'https://oapi.dingtalk.com/',
            'response_type' => 'json',
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ]
    ];

    public $providers = [
        RobotServiceProvider::class,
    ];
}