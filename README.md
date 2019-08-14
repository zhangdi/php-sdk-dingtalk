# 钉钉 SDK PHP版

钉钉服务端API的PHP实现

- [x] 群机器人

## 安装

推荐使用 [composer](http://getcomposer.org/download/).

或者运行下面的命令

```
php composer.phar require --prefer-dist "zhangdi/dingtalk:^1.0"
```

或者添加下面的代码到 composer.json 文件

```json
"zhangdi/dingtalk": "^1.0"
```

## 用法

```php
<?php

use ZhangDi\Sdk\DingTalk\Application;

// 发送机器人文本消息
$config = [
    'robot'=> [
        'access_token' => '你的群机器人 Access Token',
    ],
];

$app = new Application($config);
$rs = $app->robot->sendText("Hello World");

var_dump($rs);
```
