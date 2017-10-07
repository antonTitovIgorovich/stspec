<?php

namespace St\Listeners\UpdateBlogListeners;

use St\Events\OnUpdateBlog;
use St\Repositories\BlogRepo\BlogImageManagerBuilder;
use St\Models\Image;

//use Illuminate\Queue\InteractsWithQueue;
//use Illuminate\Contracts\Queue\ShouldQueue;

class RemoveImagesOfGallery
{
	const INPUT_NAME = 'remove_imgs';
	protected $fileManager;
	protected $model;

	/**
	 * Create the event listener.
	 *
	 */
	public function __construct()
	{
		$fileManager = new BlogImageManagerBuilder();
		$this->fileManager = $fileManager
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
		$callback = function ($removedImgsArr) {
			$this->model->deleteByFileName('file_name', $removedImgsArr);
		};

		$this->fileManager->multiRemoveImagesIfExist($event->request, $callback);
	}
}
