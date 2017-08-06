<?php

namespace St\Helpers;

use St\Helpers\Traits\ImageMultiManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class ImageManager
{
    private $fileFolder = '';
    private $inputName = '';

    use ImageMultiManagement;

    protected static function logger(string $message)
    {
        $log = new Logger('ImageManager');
        $path = storage_path('logs/image_manager.log');
        $log->pushHandler(new StreamHandler($path, Logger::DEBUG));
        $log->info($message);
    }

    protected static function getStoragePath(): string
    {
        return Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
    }

    protected function upload($imageObj): string
    {
        $fileName = rand() . '_'
            . time() . "-"
            . $imageObj->getClientOriginalName();

        $path = self::getStoragePath() . $this->fileFolder . $fileName;

        Image::make($imageObj->getRealPath())
            ->resize(600, 500)
            ->save($path);

        return $fileName;
    }

    public function setDestinationFolder(string $fileFolder)
    {
        $this->fileFolder = $fileFolder . "/";
        return $this;
    }

    public function setInputName(string $name)
    {
        $this->inputName = $name;
        return $this;
    }

    public function uploadImage(Request $request, callable $callback)
    {
        if ($request->hasFile($this->inputName)) {
            $image = $request->{$this->inputName};
            $filename = $this->upload($image);
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
        } else {
            self::logger('Remove Image Error');
        }
    }

}