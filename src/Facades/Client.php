<?php

namespace Mrlaozhou\CoreEngine\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Client
 *
 * @method static \React\Promise\PromiseInterface send(array $payload, array $to, string $order)
 * @method static \React\Promise\PromiseInterface then(callable $onFulfilled = null, callable $onRejected = null, callable $onProgress = null)
 *
 * @package Mrlaozhou\CoreEngine\Facades
 */
class Client extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'core-engine.client';
    }
}
