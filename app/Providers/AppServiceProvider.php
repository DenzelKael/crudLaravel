<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $app_env= env('APP_ENV');
        if( ( $app_env != 'local' ) && ( $app_env != 'testing' ) && $app_env !="" ){
            \URL::forceScheme('https');
            $this->app['request']->server->set('HTTPS', true);
        }
    }
}
