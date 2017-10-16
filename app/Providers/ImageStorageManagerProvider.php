<?php

namespace St\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use St\Helpers\ImageStorageManager\ImageStorageManager;

class ImageStorageManagerProvider extends ServiceProvider
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
		$this->app->singleton('ImageStorageManager', function () {
			return new ImageStorageManager();
		});

		$this->app->singleton('GetStoragePath', function () {
			return Storage::disk('public')
				->getDriver()
				->getAdapter()
				->getPathPrefix();
		});

	}
}
