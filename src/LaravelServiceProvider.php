<?php

namespace Mrlaozhou\CoreEngine;

class LaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishConfig();
    }


    public function register()
    {
        $this->mergeConfigFrom( __DIR__ . '/../config/coreengine-client.php', 'coreengine-client' );

        $this->registerBindingClasses();
    }

    /**
     * 绑定对象
     */
    protected function registerBindingClasses ()
    {
        $this->app->singleton( 'core-engine.client', function () {
            return new \Mrlaozhou\CoreEngine\Client(
                config('coreengine-client.socket-url')
                , config('coreengine-client.port')
            );
        } );
    }

    /**
     * 发布配置文件
     */
    protected function publishConfig ()
    {
        $this->publishes( [
            __DIR__ . '/../config/coreengine-client.php'  =>  config_path( 'coreengine-client.php' )
        ], 'config' );
    }
}
