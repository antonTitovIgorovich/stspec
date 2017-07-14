<?php

namespace St\Providers;

use Illuminate\Support\ServiceProvider;

use St\Helpers\ImageManager;

class ImageManagerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ImageManager', function(){
            return new ImageManager();
        });
    }
}
