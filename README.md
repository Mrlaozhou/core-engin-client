# Core-Engine Client

### Install

```bash
composer require mrlaozhou/core-engine-client
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
