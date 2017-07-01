<?php

namespace St\Http\Controllers\Admin;

use Illuminate\Http\Request;
use St\Http\Controllers\Controller;
use St\Models\Service;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Service::orderBy('id', 'desc')->paginate(4);
        return view('admin.service_list', ['content' => $content]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required|max:40',
            'img' => 'required|image',
            'text' => 'required'
        ]);

        $service = new Service;
        $items = ['title', 'desc', 'img', 'text'];
        foreach ($items as $item) {
            $service->{$item} = $request->{$item};
        }

        $service->save();
        if ($request->hasFile('img')) {
            $request->file('img')->store('services');
        }
        return back()->with('status', 'Запись добавленна!')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
