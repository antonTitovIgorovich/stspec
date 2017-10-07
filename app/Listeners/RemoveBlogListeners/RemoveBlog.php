<?php

namespace St\Listeners\RemoveBlogListeners;

use St\Events\OnRemoveBlog;
use St\Repositories\BlogRepo\BlogImageManagerBuilder;

//use Illuminate\Queue\InteractsWithQueue;
//use Illuminate\Contracts\Queue\ShouldQueue;

class RemoveBlog
{
	const INPUT_NAME = 'img_main';
	/**
	 * @var BlogImageManagerBuilder
	 */
	protected $imageFileManager;

	/**
	 * Create the event listener.
	 */
	public function __construct()
	{
		$imageFileManager = new BlogImageManagerBuilder();
		$this->imageFileManager = $imageFileManager
			->setInputName(self::INPUT_NAME)->build();
	}

	/**
	 * Handle the event.
	 *
	 * @param  OnRemoveBlog $event
	 * @return void
	 */
	public function handle(OnRemoveBlog $event)
	{
		$model = $event->specificBlogModel;
		$this->imageFileManager->removeImage($model->{self::INPUT_NAME});
		$model->delete();
	}
}
