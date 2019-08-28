<?php


namespace ZhangDi\Sdk\DingTalk\Internal\User;


use ZhangDi\Sdk\DingTalk\Internal\AccessToken;
use ZhangDi\SdkKernel\Application;
use ZhangDi\SdkKernel\Contracts\ServiceProviderInterface;

/**
 * @package ZhangDi\Sdk\DingTalk\Internal\User
 */
class ServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app->set('user', new Client($app, new AccessToken($app)));
    }

}