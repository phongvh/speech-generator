<?php

namespace Phongvh\SpeechGen;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\View;
use Phongvh\SpeechGen\Facades\SpeechGen as SpeechGenFacade;

class SpeechGenServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('SpeechGen', SpeechGenFacade::class);

        $this->app->singleton('SpeechGen', function () {
            return new SpeechGen();
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'speechgen');
    }
}