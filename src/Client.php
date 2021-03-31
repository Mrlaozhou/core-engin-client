<?php
namespace Mrlaozhou\CoreEngine;

use React\Promise\PromiseInterface;
use Ratchet\Client\WebSocket;
use function Ratchet\Client\connect;

class Client
{

    /**
     * @var \React\Promise\PromiseInterface
     */
    protected $_connect;

    /**
     * Client constructor.
     *
     * @param string     $websocketUrl
     * @param int        $port
     * @param array|null $headers
     * @param array      $subProtocols
     */
    public function __construct(string $websocketUrl, int $port, array $headers = null, array $subProtocols= [])
    {
        $websocketAddress          =   "ws://{$websocketUrl}:{$port}";
        $headers            =   array_merge( ['_key' => config('coreengine-client.key')], $headers ?: [] );
        $this->_connect = connect($websocketAddress, $subProtocols, $headers);
    }

    /**
     * @param callable|null $onFulfilled
     * @param callable|null $onRejected
     * @param callable|null $onProgress
     *
     * @return \React\Promise\PromiseInterface
     */
    public function then(callable $onFulfilled = null, callable $onRejected = null, callable $onProgress = null)
    {
        return $this->connection()->then(...func_get_args());
    }

    /**
     * @param array  $payload
     * @param array  $to
     * @param string $order
     *
     * @return \React\Promise\PromiseInterface
     */
    public function send(array $payload, array $to, string $order):PromiseInterface
    {
        $formatData             =   json_encode(compact('order', 'to', 'payload'));
        return $this->then(function (WebSocket $conn) use ($formatData) { return $conn->send($formatData); });
    }


    /**
     * @return \React\Promise\PromiseInterface
     */
    protected function connection():PromiseInterface
    {
        return $this->_connect;
    }
}
