<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        view()->composer('*',function($view){
            $view->with([
                'dashboards_assets' => url('/').env('RESOURCE_URL').'/assets',
                'web_assets' => url('/').env('RESOURCE_URL').'/web',

            ]);
        });
    }
}
