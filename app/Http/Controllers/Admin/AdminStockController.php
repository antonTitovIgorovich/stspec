<?php

namespace St\Http\Controllers\Admin;

use St\Repositories\StockRepo\StockRepoContract;
use St\Http\Requests\StockRequest;
use St\Http\Controllers\Controller;
use St\Models\Stock;

class AdminStockController extends Controller
{
	public $repository;

	/**
	 * AdminStockController constructor.
	 * @param StockRepoContract $stock
	 */
	public function __construct(StockRepoContract $stock)
	{
		$this->repository = $stock;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$content = $this->repository->getAll();
		return view('admin.stock.stock_list', compact('content'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.stock.stock_create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \St\Http\Requests\StockRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(StockRequest $request)
	{
		$this->repository->store($request);
		return back()
			->with('status', 'Акция добавленна!')
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
		return view('admin.stock.stock_show', compact('content'));
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
		return view('admin.stock.stock_edit', compact('content'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \St\Http\Requests\StockRequest $request
	 * @param  int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(StockRequest $request, $id)
	{
		$this->repository->update($request, $id);
		return back()
			->with('status', 'Акция обновленна!')
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
