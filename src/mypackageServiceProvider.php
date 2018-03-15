<?php

namespace myvendor\mypackage;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class mypackageServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        dd('testing');
        // use this if your package has views
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'mypackage');
        
        // use this if your package has lang files
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'mypackage');
        
        // use this if your package has routes
        $this->setupRoutes($this->app->router);
        
        // use this if your package needs a config file
        // $this->publishes([
        //         __DIR__.'/config/config.php' => config_path('mypackage.php'),
        // ]);
        
        // use the vendor configuration file as fallback
        // $this->mergeConfigFrom(
        //     __DIR__.'/config/config.php', 'mypackage'
        // );
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'myvendor\mypackage\Http\Controllers'], function($router)
        {
            require __DIR__.'/Http/routes.php';
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registermypackage();
        
        // use this if your package has a config file
        // config([
        //         'config/mypackage.php',
        // ]);
    }

    private function registermypackage()
    {
        $this->app->bind('mypackage',function($app){
            return new mypackage($app);
        });
    }
}