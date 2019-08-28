<?php


namespace ZhangDi\Sdk\DingTalk\Internal\User;


use ZhangDi\Sdk\DingTalk\Internal\BaseClient;

class Client extends BaseClient
{
    /**
     * @param string $code
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserInfo(string $code)
    {
        return $this->request('GET', 'user/getuserinfo', [
            'query' => [
                'code' => $code
            ]
        ]);
    }

    /**
     * @param string $userId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $userId)
    {
        return $this->request('GET', 'user/get', [
            'query' => [
                'userid' => $userId
            ]
        ]);
    }
}