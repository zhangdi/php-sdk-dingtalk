<?php
/**
 * Copyright (c) 2019. Zhang Di <zhangdi_me@163.com>
 */

namespace ZhangDi\Sdk\DingTalk\Robot;


use ZhangDi\SdkKernel\Application;
use ZhangDi\SdkKernel\Contracts\ServiceProviderInterface;

class RobotServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app->set('robot', new Client($app, new AccessToken($app)));
    }

}