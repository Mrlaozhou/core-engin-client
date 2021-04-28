# Core-Engine Client

### Install

```bash
composer require mrlaozhou/core-engine-client
```

### Config
config/coreengine-client.php
```php 
<?php
return [

    //  当前平台的key

    'key'           =>  env('CEC_KEY', 'system'),


    //  websocket 地址
    'socket-url'    =>  env('CEC_URL', ''),

    //  端口
    'port'          =>  env('CEC_PORT', 9251),

    //  token
    'token'         =>  env('CEC_TOKEN', null),
];
```

### Usage

```php
/**
 * @param array  $payload 载体信息
 * @param array  $to 发送至
 * @param string $order 指令
 *
 * @return \React\Promise\PromiseInterface
 */
 
$payload    =   ['type' => 'txt', 'content' => 'close your eyes .'];
$to         =   [ ['key'=>'crm::2'], ['key'=>'crm::12'] ];
$order      =   'receive.approval';
\CoreEngineClient::send( $payload, $to, $order );
```
