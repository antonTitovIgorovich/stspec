<?php

namespace St\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use St\Http\Requests\StoreServiceArticle;
use St\Http\Requests\UpdateServiceArticle;
use St\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use St\Models\Service;

class AdminServiceController extends Controller
{
    private static $fileFolder = 'services/';

    private static function getStoragePath(){
        return Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
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

        if ($request->hasFile('img')) {
            $image = $request->img;
            $fileName = time() . "-" . $image->getClientOriginalName();
            $path = self::getStoragePath() . self::$fileFolder . $fileName;
            $image = Image::make($image->getRealPath())
                ->resize(600, 500)
                ->save($path);

            $service->img = $fileName;
        }
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

        if ($request->hasFile('img')) {
            //add the new photo
            $image = $request->img;
            $fileName = time() . "-" . $image->getClientOriginalName();
            $path = self::getStoragePath() . self::$fileFolder . $fileName;
            Image::make($image->getRealPath())
                ->resize(600, 500)
                ->save($path);
            $oldFileName = $service->img;
            //update the database
            $service->img = $fileName;
            //delete the old photo
            if (Storage::exists(self::$fileFolder . $oldFileName)) {
                Storage::delete(self::$fileFolder . $oldFileName);
            }

        }
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
        $image = $service->img;
        if (Storage::exists(self::$fileFolder . $image)) {
            Storage::delete(self::$fileFolder . $image);
        }

        $service->delete();

        return response()->json(['id' => $id]);
    }
}
