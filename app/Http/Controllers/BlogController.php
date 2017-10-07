<?php

namespace St\Http\Controllers;

use St\Repositories\BlogRepo\BlogRepoContract;

class BlogController extends SiteController
{
	/**
	 * @var BlogRepoContract
	 */
	protected $repository;

	/**
	 * BlogController constructor.
	 * @param BlogRepoContract $blog
	 */
	public function __construct(BlogRepoContract $blog)
	{
		parent::__construct();
		$this->repository = $blog;
	}


	public function index()
	{
		$posts = $this->repository->paginate(5);
		$this->setTemplate('blog');
		$this->addVars('posts', $posts);
		return $this->renderOutput();
	}

	public function show($id)
	{
		$content = $this->repository->getById($id);
		$this->setTemplate('blog-post');
		$this->addVars('content', $content);
		return $this->renderOutput();
	}
}
