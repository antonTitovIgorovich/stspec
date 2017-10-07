<?php

namespace St\Listeners\RemoveBlogListeners;

use St\Events\OnRemoveBlog;
use St\Repositories\BlogRepo\BlogImageManagerBuilder;
use St\Models\{
	Blog, Image
};

//use Illuminate\Queue\InteractsWithQueue;
//use Illuminate\Contracts\Queue\ShouldQueue;

class RemoveGalleryImages
{
	/**
	 * @var Blog
	 */
	protected $blogModel;
	/**
	 * @var Image
	 */
	protected $imageModel;
	/**
	 * @var BlogImageManagerBuilder
	 */
	protected $imageFileManager;

	/**
	 * Create the event listener.
	 */
	public function __construct()
	{
		$this->blogModel = new Blog();
		$this->imageModel = new Image();
		$imageFileManager = new BlogImageManagerBuilder();
		$this->imageFileManager = $imageFileManager
			->setInputName('gallery')->build();
	}

	/**
	 * Handle the event.
	 *
	 * @param  OnRemoveBlog $event
	 * @return void
	 */
	public function handle(OnRemoveBlog $event)
	{
		$blogModel = $this->blogModel->getById($event->blogId);
		$event->setSpecificBlogModel($blogModel);

		$blogImages = $blogModel->images;

		if (count($blogImages) > 0) {
			foreach ($blogImages as $image) {
				$this->imageFileManager->removeImage($image->file_name);
			}
			$this->imageModel->deleteByBlogId($event->blogId);
		}

	}
}
