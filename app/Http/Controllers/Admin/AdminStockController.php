<?php

namespace St\Http\Controllers\Admin;

use St\Http\Requests\StockRequest;
use St\Http\Controllers\Controller;
use St\Models\Stock;

class AdminStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Stock::all();
        return view('admin.stock.stock_list', ['content' => $content]);
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
     * @param  St\Http\Requests\StockRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockRequest $request)
    {
        $stockOrm = new Stock();
        $stockOrm->title = $request->title;
        $stockOrm->text = $request->text;
        $stockOrm->save();
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
        $content = Stock::find($id);
        return view('admin.stock.stock_show', ['content' => $content]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Stock::find($id);
        return view('admin.stock.stock_edit', ['content' => $content]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  St\Http\Requests\StockRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StockRequest $request, $id)
    {
        $stockOrm = Stock::find($id);
        $stockOrm->title = $request->title;
        $stockOrm->text = $request->text;
        $stockOrm->save();
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
        $stockOrm = Stock::find($id);
        $stockOrm->delete();
        return response()->json(['id' => $id]);
    }
}
