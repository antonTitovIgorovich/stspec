<?php

namespace St\Http\Controllers\Admin;

use St\Http\Controllers\Controller;
use St\Repositories\ServiceRepo\ServiceRepoContract;
use St\Http\Requests\{
	StoreServiceArticle, UpdateServiceArticle
};

class AdminServiceController extends Controller
{
	/**
	 * @var ServiceRepoContract
	 */
	protected $repository;

	/**
	 * AdminServiceController constructor.
	 * @param ServiceRepoContract $repository
	 */
	public function __construct(ServiceRepoContract $repository)
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
		return view('admin.service.service_list', compact('content'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.service.service_create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \St\Http\Requests\StoreServiceArticle $request ;
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(StoreServiceArticle $request)
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
		return view('admin.service.service_show', compact('content'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$content = $this->repository->getById($id);
		return view('admin.service.service_edit', compact('content'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \St\Http\Requests\UpdateServiceArticle $request
	 * @param  int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(UpdateServiceArticle $request, $id)
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
