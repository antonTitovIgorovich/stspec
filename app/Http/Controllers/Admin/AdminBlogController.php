<?php

namespace St\Http\Controllers\Admin;

use St\Http\Controllers\Controller;
use App;
use St\Http\Requests\{
	StoreBlogRequest, UpdateBlogRequest
};
use St\Models\{
	Blog, Image
};
use St\Repositories\BlogRepo\BlogRepoContract;

class AdminBlogController extends Controller
{

	/**
	 * @var BlogRepoContract
	 */
	private $repository;

//	private static function getImageManager(string $inputName, string $subFolder)
//	{
//		return App::make('ImageUploader')
//			->setInputName($inputName)
//			->setDestinationFolder('blog/' . $subFolder);
//	}

	public function __construct(BlogRepoContract $repository)
	{
		$this->repository = $repository;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$content = $this->repository->paginate(8);
		return view('admin.blog.blog_list', compact('content'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.blog.blog_create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \St\Http\Requests\StoreBlogRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(StoreBlogRequest $request)
	{
		$this->repository->store($request);
		return back()
			->with('status', 'Запись добавленна!')
			->withInput();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$content = $this->repository->getById($id);
		return view('admin.blog.blog_show', compact('content'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$content = Blog::find($id);
		return view('admin.blog.blog_edit', ['content' => $content]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \St\Http\Requests\UpdateBlogRequest $request
	 * @param  int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(UpdateBlogRequest $request, $id)
	{
		$this->repository->update($request, $id);
		return back()
			->with('status', 'Запись обновленна!')
			->withInput();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$this->repository->delete($id);
		return response()->json(compact('id'));
	}
}
