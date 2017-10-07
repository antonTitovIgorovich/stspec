<?php

namespace St\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use DB;

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
//		 DB::listen(function ($query) {
//		     dump($query->sql);
//		     dump($query->bindings);
//		 });
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
