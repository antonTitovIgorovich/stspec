<?php

namespace St\Http\Controllers\Admin;

use St\Http\Controllers\Controller;
use St\Models\Service;
use App;
use St\Http\Requests\{
    StoreServiceArticle, UpdateServiceArticle
};

class AdminServiceController extends Controller
{
    /**
     * Get class ImageManager with settings.
     *
     * @return \St\App\Http\Helpers\ImageManager;
     */

    private static function getImageManager()
    {
        return App::make('ImageManager')
            ->setInputName('img')
            ->setDestinationFolder('services');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Service::orderBy('id', 'desc')->paginate(8);
        return view('admin.service.service_list', ['content' => $content]);
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
     * @param  $request ;
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreServiceArticle $request)
    {
        $service = new Service;
        $service->title = $request->title;
        $service->desc = $request->desc;
        $service->keywords = $request->keywords;
        $service->text = $request->text;
        $service->main_page = $request->main_page === 'on' ? 1 : null;

        self::getImageManager()
            ->uploadImage($request,
                function ($imageName) use ($service) {
                    $service->img = $imageName;
                });

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
        return view('admin.service.service_show', ['content' => $content]);
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
        return view('admin.service.service_edit', ['content' => $content]);
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
        $service = Service::find($id);
        $service->title = $request->title;
        $service->desc = $request->desc;
        $service->keywords = $request->keywords;
        $service->text = $request->text;
        $service->main_page = $request->main_page === 'on' ? 1 : null;

        $oldImageName = $service->img;
        self::getImageManager()
            ->updateImage($request, $oldImageName,
                function ($newImage) use ($service) {
                    $service->img = $newImage;
                });

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
