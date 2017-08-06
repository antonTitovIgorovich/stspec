<?php
namespace St\Helpers\Contracts;

use Illuminate\Http\Request;

/*
 *
 */
interface ImageManagerContract
{
    static function getStoragePath();
    function setFileFolder(string $fileFolder);
    function setInputName(string $name);
    function uploadImage(Request $request);
    public function updateImage(Request $request, $oldFileName);
    function removeImage($fileName);
}
