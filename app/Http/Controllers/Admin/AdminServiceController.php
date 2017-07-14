<?php

namespace St\Http\Controllers\Admin;

use Illuminate\Support\Facades\App;
use St\Http\Requests\StoreServiceArticle;
use St\Http\Requests\UpdateServiceArticle;
use St\Http\Controllers\Controller;
use St\Models\Service;

class AdminServiceController extends Controller
{
    private static function getImageManager()
    {
        return App::make('ImageManager')
            ->setInputName('img')
            ->setFileFolder('services/');
    }

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
     * @param  $request ;
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreServiceArticle $request)
    {
        $service = new Service;
        $service->title = $request->title;
        $service->desc = $request->desc;
        $service->text = $request->text;
        $service->main_page = $request->main_page === 'on' ? 1 : null;

        $imageName = self::getImageManager()->uploadImage($request);
        $service->img = $imageName;

        $service->save();

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
        $content = Service::find($id);
        return view('admin.service_show', ['content' => $content]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Service::find($id);
        return view('admin.service_edit', ['content' => $content]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  St\Http\Requests\UpdateServiceArticle $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateServiceArticle $request, $id)
    {
        $service = Service::find($id);
        $service->title = $request->title;
        $service->desc = $request->desc;
        $service->text = $request->text;
        $service->main_page = $request->main_page === 'on' ? 1 : null;

        $newImageName = self::getImageManager()
            ->updateImage($request, $service->img);
        $service->img = $newImageName;
        $service->save();

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
        $service = Service::find($id);

        self::getImageManager()->removeImage($service->img);

        $service->delete();

        return response()->json(['id' => $id]);
    }
}
