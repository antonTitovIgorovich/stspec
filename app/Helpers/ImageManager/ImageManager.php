<?php

namespace St\Helpers\ImageManager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageManager
{
    private $inputName = '';
    private $fileFolder = '';
    private $storagePath = '';

    public function __construct()
    {
        $storagePath = Storage::disk('public')
            ->getDriver()
            ->getAdapter()
            ->getPathPrefix();
        $this->storagePath = $storagePath;
    }

    public function setDestinationFolder(string $fileFolder)
    {
        $this->fileFolder = $fileFolder . "/";
        if (!is_dir($this->storagePath . $fileFolder)) {
            Storage::makeDirectory($fileFolder);
        }
        return $this;
    }

    public function setInputName(string $name)
    {
        $this->inputName = $name;
        return $this;
    }

    protected function simpleUpload($imageObj): string
    {
        $fileName = rand() . '_'
            . time() . "-"
            . $imageObj->getClientOriginalName();

        $path = $this->storagePath . $this->fileFolder . $fileName;

        Image::make($imageObj->getRealPath())
            ->resize(600, 500)
            ->save($path);

        return $fileName;
    }

    public function uploadImage(Request $request, callable $callback)
    {
        if ($request->hasFile($this->inputName)) {
            $image = $request->{$this->inputName};
            $filename = $this->simpleUpload($image);
            $callback($filename);
        }
        return false;
    }

    public function updateImage(Request $request, string $oldFileName, callable $callback)
    {
        $this->uploadImage($request,
            function ($fileName) use ($oldFileName, $callback) {
                $this->removeImage($oldFileName);
                $callback($fileName);
            });
    }

    public function removeImage(string $fileName)
    {
        if (Storage::exists($this->fileFolder . $fileName)) {
            Storage::delete($this->fileFolder . $fileName);
        }
    }

    public function multiUploadImages(Request $request, callable $callback)
    {
        if ($request->hasFile($this->inputName)) {
            
            $images = $request->{$this->inputName};
            
            $fileNamesArr = array_map(function ($image) {
                return $this->simpleUpload($image);
            }, $images);

            $callback($fileNamesArr);
        }
        return false;
    }


    public function multiRemoveImages(Request $request, callable $callback)
    {
        $deleteStrategy = new StrategyForTheArrayOfNames("string");
        $deleteStrategy->setRequest($request);
        $deleteStrategy->setInputName($this->inputName);
        $namesArr = $deleteStrategy->getNamesArr();

        if (!empty($namesArr)) {
            foreach ($namesArr as $fileName) {
                $this->removeImage($fileName);
            };
            $callback($namesArr);
        }

        return false;
    }

}