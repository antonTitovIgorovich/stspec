<?php

namespace St\Repositories\BlogRepo;

use St\Events\OnCreateBlog;
use St\Events\OnRemoveBlog;
use St\Events\OnUpdateBlog;
use St\Models\Blog;
use Illuminate\Foundation\Http\FormRequest;
use St\Repositories\GeneralMethodsOfRepoAbstract as GeneralMethods;

class BlogRepo
	extends GeneralMethods
	implements BlogRepoContract
{
	/**
	 * @var Blog
	 */
	protected $model;

	/**
	 * BlogRepo constructor.
	 */
	public function __construct()
	{
		$this->model = new Blog();
	}

	public function store(FormRequest $request)
	{
		event(new OnCreateBlog($request));
	}

	public function update(FormRequest $request, int $id)
	{
		event(new OnUpdateBlog($request, $id));
	}

	public function delete(int $id)
	{
		event(new OnRemoveBlog($id));
	}

}