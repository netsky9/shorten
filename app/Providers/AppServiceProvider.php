<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('custom_url', function($attribute, $value, $parameters)  {
            $url = str_replace(["ä","ö","ü"], ["ae", "oe", "ue"], $value);
            return filter_var($url, FILTER_VALIDATE_URL);
        });
    }
}
