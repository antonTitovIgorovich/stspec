<?php

namespace St\Listeners\CreateBlogListeners;

use St\Events\OnCreateBlog;
use St\Repositories\BlogRepo\BlogImageManagerBuilder;
use St\Models\Image;

//use Illuminate\Queue\InteractsWithQueue;
//use Illuminate\Contracts\Queue\ShouldQueue;

class CreateImage
{
	const INPUT_NAME = 'gallery_imgs';
	protected $imgFileManager;
	protected $model;

	/**
	 * Create the event listener.
	 *
	 */
	public function __construct()
	{
		$fileManager = new BlogImageManagerBuilder();
		$this->imgFileManager = $fileManager
			->setInputName(self::INPUT_NAME)->build();

		$this->model = new Image();
	}

	/**
	 * Handle the event.
	 *
	 * @param  OnCreateBlog $event
	 * @return void
	 */
	public function handle(OnCreateBlog $event)
	{
		$callback = function ($fileNamesArr) use ($event) {
			$this->model->multiInsert($event->createdBlogId, $fileNamesArr);
		};

		$this->imgFileManager->multiUploadImagesIfExist($event->request, $callback);
	}
}
