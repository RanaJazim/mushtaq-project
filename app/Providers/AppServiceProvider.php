<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::component('modules.alert', 'alert');
        Blade::component('modules.topButton', 'btn');
        Blade::component('modules.form', 'myform');
        Blade::component('modules.clearbtn', 'btnclear');
        Blade::component('modules.table', 'mytable');
        Blade::component('modules.modal', 'modal');
    }
}
