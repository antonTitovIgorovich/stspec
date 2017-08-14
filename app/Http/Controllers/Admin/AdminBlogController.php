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

class AdminBlogController extends Controller
{
    /**
     * Get class ImageManager with settings.
     *
     * @param string $inputName ;
     * @param string $subFolder ;
     * @return \St\App\Http\Helpers\ImageManager;
     */

    private static function getImageManager(string $inputName, string $subFolder)
    {
        return App::make('ImageManager')
            ->setInputName($inputName)
            ->setDestinationFolder('blog/' . $subFolder);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Blog::orderBy('id', 'desc')->paginate(8);
        return view('admin.blog.blog_list', ['content' => $content]);
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
        $blogOrm = new Blog;
        $blogOrm->title = $request->title;
        $blogOrm->desc = $request->desc;
        $blogOrm->keywords = $request->keywords;
        $blogOrm->text = $request->text;

        //Upload main image
        self::getImageManager('img_main', 'img_main')
            ->uploadImage($request,
                function ($fileName) use ($blogOrm) {
                    $blogOrm->img_main = $fileName;
                });

        $blogOrm->save();

        // Upload images to the gallery
        self::getImageManager('gallery_imgs', 'gallery')
            ->multiUploadImages($request,
                function ($galleryNamesArr) use ($blogOrm) {
                    Image::multiInsert($blogOrm->id, $galleryNamesArr);
                });


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
        $content = Blog::find($id);
        return view('admin.blog.blog_show', ['content' => $content]);
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
        $blogOrm = Blog::find($id);
        $blogOrm->title = $request->title;
        $blogOrm->desc = $request->desc;
        $blogOrm->keywords = $request->keywords;
        $blogOrm->text = $request->text;

        // Update main image
        $oldMainImgName = $blogOrm->img_main;
        self::getImageManager('img_main', 'img_main')
            ->updateImage($request, $oldMainImgName,
                function ($newName) use ($blogOrm) {
                    $blogOrm->img_main = $newName;
                });


        // Update Blog-model.
        $blogOrm->save();

        // Remove images from the gallery.
        self::getImageManager('remove_imgs', 'gallery')
            ->multiRemoveImages($request,
                function ($removedImgsArr) {
                    Image::whereIn('file_name', $removedImgsArr)->delete();
                });

        // Upload images to the gallery.
        self::getImageManager('gallery_imgs', 'gallery')
            ->multiUploadImages($request,
                function ($galleryNamesArr) use ($blogOrm) {
                    Image::multiInsert($blogOrm->id, $galleryNamesArr);
                });

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
        $blog = Blog::find($id);

        $imageManger = App::make('ImageManager');

        /*
         * If there are images in the gallery,
         * then delete this images.
         */
        if (count($blog->images) > 0) {
            $imageMangerGallery = $imageManger
                ->setDestinationFolder('blog/gallery');

            foreach ($blog->images as $image) {
                $imageMangerGallery->removeImage($image->file_name);
            }

            Image::where("blog_id", $id)->delete();
        }

        //Delete the main image
        $imageManger->setDestinationFolder('blog/img_main')
            ->removeImage($blog->img_main);

        $blog->delete();

        return response()->json(['id' => $id]);
    }
}
