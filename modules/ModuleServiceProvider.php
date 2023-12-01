<?php

namespace Modules;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;


use Modules\User\src\Repositories\UserRepository;

class ModuleServiceProvider extends ServiceProvider
{
    private $middlewares = [

    ];
    private $commands=[

    ];
    public function boot()
    {
        $modules = $this->getModules();
        if (!empty($modules)) {
            foreach ($modules as $module) {
                $this->registerModule($module);
            }
        }
    }

    public function register()
    {
        //Khai báo configs
        $modules = $this->getModules();
        if (!empty($modules)) {
            foreach ($modules as $module) {
                $this->registerConfig($module);
            }

        }

        //Middleware
        $this->registerMiddlewares();

        //Commands
        $this->commands($this->commands);

        $this->app->singleton(
            UserRepository::class
        );
    }

    //Load Modules
    private function getModules()
    {
        $directories = array_map('basename', File::directories(__DIR__));
        return $directories;
    }

    // Register Module
    private function registerModule($module)
    {
        $modulePath = __DIR__ . "/{$module}";
        // echo $modulePath.'<br/>';
        //Khai báo routes
        if (File::exists($modulePath . '/routes/web.php')) {

            $this->loadRoutesFrom($modulePath . '/routes/web.php');
        }

        //Khai báo migrations
        if (File::exists($modulePath . '/migrations')) {

            $this->loadMigrationsFrom($modulePath . '/migrations');
        }

        //Khai báo languages
        if (File::exists($modulePath . '/resources/lang')) {

            $this->loadTranslationsFrom($modulePath . '/resources/lang', strtolower($module));
            $this->loadJsonTranslationsFrom($modulePath . '/resources/lang');
        }
        //Khai báo views
        if (File::exists($modulePath . '/resources/views')) {

            $this->loadViewsFrom($modulePath . '/resources/views', strtolower($module) );
        }
        //Khai báo helpers
        if (File::exists($modulePath . '/helpers')) {

            $helperList = File::allFiles($modulePath . '/helpers');
            if (!empty($helperList)) {
                foreach ($helperList as $helper) {
                    $file = $helper->getPathName();
                    require $file;
                }
            }
        }
    }

    //Register configs
    private function registerConfig($module)
    {
        $configPath = __DIR__ . '/' . $module . '\configs';

        if (File::exists($configPath)) {

            $configFiles = array_map('basename', File::allFiles($configPath));
            foreach ($configFiles as $config) {
                $alias = basename($config, '.php');
                $this->mergeConfigFrom($configPath . '/' . $config, $alias);
            }
        }
    }
    //Register Middlewares
    private function registerMiddlewares(){
        if (!empty($this->middlewares)) {
            foreach ($this->middlewares as $key => $middleware) {

                $this->app['router']->pushMiddlewareToGroup($key, $middleware);
            }
        }
    }
}
