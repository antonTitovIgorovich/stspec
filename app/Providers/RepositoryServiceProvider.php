<?php

namespace St\Providers;

use Illuminate\Support\ServiceProvider;
use St\Repositories\ServiceRepo\{
	ServiceRepoContract, ServiceRepo
};
use St\Repositories\BlogRepo\{
	BlogRepoContract, BlogRepo
};
use St\Repositories\StockRepo\{
	StockRepoContract, StockRepo
};


class RepositoryServiceProvider extends ServiceProvider
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
		$this->app->bind(ServiceRepoContract::class, function () {
			return new ServiceRepo();
		});

		$this->app->bind(BlogRepoContract::class, function () {
			return new BlogRepo();
		});

		$this->app->bind(StockRepoContract::class, function () {
			return new StockRepo();
		});


	}
}
