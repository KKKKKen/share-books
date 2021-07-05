<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema; 
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\App;
//追加 


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        // if (App::environment('production')) {
        //     URL::forceScheme('https');
        // } 
        // 追加
        // if ($this->app->environment() == 'production') {
        //     URL::forceScheme('https');
        }



}

