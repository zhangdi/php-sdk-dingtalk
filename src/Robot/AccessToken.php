<?php
/**
 * Copyright (c) 2019. Zhang Di <zhangdi_me@163.com>
 */

namespace ZhangDi\Sdk\DingTalk\Robot;


use Psr\Http\Message\RequestInterface;
use ZhangDi\SdkKernel\Application;
use ZhangDi\SdkKernel\Contracts\AccessTokenInterface;

class AccessToken implements AccessTokenInterface
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function getToken(): array
    {
        return [
            'accessToken' => $this->app->getConfig()['robot']['access_token'],
        ];
    }

    public function refresh(): AccessTokenInterface
    {
        return $this;
    }

    public function applyToRequest(RequestInterface $request, array $requestOptions = []): RequestInterface
    {
        parse_str($request->getUri()->getQuery(), $query);
        $query = http_build_query(array_merge(['access_token' => $this->getToken()['accessToken']], $query));

        return $request->withUri($request->getUri()->withQuery($query));
    }

}