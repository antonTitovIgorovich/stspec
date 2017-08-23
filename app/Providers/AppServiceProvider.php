<?php

namespace St\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale(config('app.locale'));
       // DB::listen(function ($query) {
       //     dump($query->sql);
       //     dump($query->bindings);
       // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
