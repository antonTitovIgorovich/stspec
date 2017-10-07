<?php

namespace St\Listeners\UpdateBlogListeners;

use St\Events\OnUpdateBlog;
use St\Repositories\BlogRepo\BlogImageManagerBuilder;
use St\Models\Image;

//use Illuminate\Queue\InteractsWithQueue;
//use Illuminate\Contracts\Queue\ShouldQueue;

class AddImagesForGallery
{
	const INPUT_NAME = 'gallery_imgs';
	/**
	 * @var BlogImageManagerBuilder
	 */
	protected $imgFileManager;
	/**
	 * @var Image
	 */
	protected $model;

	/**
	 * Create the event listener.
	 *
	 */
	public function __construct()
	{
		$imgFileManager = new BlogImageManagerBuilder();
		$this->imgFileManager = $imgFileManager
			->setInputName(self::INPUT_NAME)->build();

		$this->model = new Image();
	}

	/**
	 * Handle the event.
	 *
	 * @param  OnUpdateBlog $event
	 * @return void
	 */
	public function handle(OnUpdateBlog $event)
	{
		$callback = function ($fileNamesArr) use ($event) {
			$this->model->multiInsert($event->updatedBlogId, $fileNamesArr);
		};

		$this->imgFileManager->multiUploadImagesIfExist($event->request, $callback);
	}
}
