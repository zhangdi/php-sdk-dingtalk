<?php


namespace ZhangDi\Sdk\DingTalk\Internal;


use Psr\Http\Message\RequestInterface;
use ZhangDi\SdkKernel\Application;
use ZhangDi\SdkKernel\Contracts\AccessTokenInterface;
use ZhangDi\SdkKernel\Exceptions\InvalidConfigException;
use ZhangDi\SdkKernel\Exceptions\RuntimeException;

class AccessToken implements AccessTokenInterface
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function getToken(): array
    {
        $response = $this->app->client->get('gettoken', [
            'query' => [
                'appkey' => $this->app->config->get('appKey'),
                'appsecret' => $this->app->config->get('appSecret'),
            ]
        ]);

        $ret = \json_decode($response->getBody()->getContents(), true);
        if ($ret['errcode'] == 0) {
            return [
                'accessToken' => $ret['access_token'],
            ];
        }
        throw new RuntimeException(\json_encode($ret));
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