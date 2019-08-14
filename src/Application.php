<?php
/**
 * Copyright (c) 2019. Zhang Di <zhangdi_me@163.com>
 */

namespace ZhangDi\Sdk\DingTalk;

use ZhangDi\Sdk\DingTalk\Robot\RobotServiceProvider;
use ZhangDi\SdkKernel\Application as BaseApplication;

/**
 * Class Application
 * @package ZhangDi\Sdk\DingTalk
 *
 * @property Robot\Client $robot
 */
class Application extends BaseApplication
{
    public $id   = 'dingtalk';
    public $name = '钉钉SDK';

    public $defaultConfig = [
        'http_client'=>[
            'response_type'=>'json'
        ]
    ];

    public $providers = [
        RobotServiceProvider::class,
    ];
}