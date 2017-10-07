<?php

namespace St\Listeners\UpdateBlogListeners;

use St\Events\OnUpdateBlog;
use St\Repositories\BlogRepo\BlogImageManagerBuilder;
use St\Models\Blog;
use St\Helpers\ModelRecorder\ModelRecorder;

//use Illuminate\Queue\InteractsWithQueue;
//use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateMainImage
{
	const INPUT_NAME = 'img_main';
	protected $imgFileManager;
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

		$this->model = new Blog();
	}

	/**
	 * Handle the event.
	 *
	 * @param  OnUpdateBlog $event
	 * @return void
	 */
	public function handle(OnUpdateBlog $event)
	{
		$model = $this->model->getById($event->updatedBlogId);

		$modelRecorder = new ModelRecorder($model, $event->request);

		$callback = function ($newName) use ($modelRecorder) {
			$modelRecorder->assignValue([self::INPUT_NAME => $newName]);
		};

		$modelRecorder->setIgnoredValue(self::INPUT_NAME);

		$this->imgFileManager->updateImageIfExist($event->request, $model->img_main, $callback);

		$modelRecorder->save();

	}
}
