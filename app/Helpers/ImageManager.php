<?php

namespace St\Helpers;

use St\Helpers\Contracts\ImageManagerContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageManager implements ImageManagerContract
{
    private static $fileFolder = '';
    private static $inputName = '';

    static function getStoragePath()
    {
        return Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
    }

    public function setFileFolder(string $fileFolder)
    {
        self::$fileFolder = $fileFolder;
        return $this;
    }

    public function setInputName(string $name)
    {
        self::$inputName = $name;
        return $this;
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile(self::$inputName)) {
            $image = $request->{self::$inputName};
            $fileName = time() . "-" . $image->getClientOriginalName();
            $path = self::getStoragePath() . self::$fileFolder . $fileName;
            Image::make($image->getRealPath())
                ->resize(600, 500)
                ->save($path);
            return $fileName;
        }
    }

    public function updateImage(Request $request, $oldFileName)
    {
        $successUpload = $this->uploadImage($request);
        if ($successUpload) {
            $this->removeImage($oldFileName);
            return $successUpload;
        }
    }

    public function removeImage($fileName)
    {
        if (Storage::exists(self::$fileFolder . $fileName)) {
            Storage::delete(self::$fileFolder . $fileName);
        }
    }

}