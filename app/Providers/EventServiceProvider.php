<?php

namespace St\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'St\Events\OnCreateBlog' => [
			'St\Listeners\CreateBlogListeners\CreateBlog',
			'St\Listeners\CreateBlogListeners\CreateImage'
		],
		'St\Events\OnUpdateBlog' => [
			'St\Listeners\UpdateBlogListeners\UpdateMainImage',
			'St\Listeners\UpdateBlogListeners\RemoveImagesOfGallery',
			'St\Listeners\UpdateBlogListeners\AddImagesForGallery',
		],
		'St\Events\OnRemoveBlog' => [
			'St\Listeners\RemoveBlogListeners\RemoveGalleryImages',
			'St\Listeners\RemoveBlogListeners\RemoveBlog',
		]
	];

	/**
	 * Register any events for your application.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();

		//
	}
}
