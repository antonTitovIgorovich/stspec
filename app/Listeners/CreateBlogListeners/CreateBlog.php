<?php

namespace St\Listeners\CreateBlogListeners;

use St\Events\OnCreateBlog;
use St\Repositories\BlogRepo\BlogImageManagerBuilder;
use St\Models\Blog;
use St\Helpers\ModelRecorder\ModelRecorder;

//use Illuminate\Queue\InteractsWithQueue;
//use Illuminate\Contracts\Queue\ShouldQueue;

class CreateBlog
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
		$imgManager = new BlogImageManagerBuilder();
		$this->imgFileManager = $imgManager
			->setInputName(self::INPUT_NAME)->build();

		$this->model = new Blog();
	}

	/**
	 * Handle the event.
	 *
	 * @param  OnCreateBlog $event
	 * @return void
	 */
	public function handle(OnCreateBlog $event)
	{
		$modelRecorder = new ModelRecorder($this->model, $event->request);
		$callback = function ($fileName) use ($modelRecorder) {
			$modelRecorder->assignValue([self::INPUT_NAME => $fileName]);
		};
		$this->imgFileManager->uploadImageIfExist($event->request, $callback);
		$modelRecorder->save();

		$event->setCreatedBlogId($this->model->id);
	}
}
