<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 24.09.17
 * Time: 22:32
 */

namespace St\Helpers\ImageStorageManager;

use Illuminate\Http\Request;

interface ImageStorageManagerContract
{
	public function setDestinationPath(string $destinationPath);

	public function setInputName(string $name);

	public function uploadImageIfExist(Request $request, callable $callback);

	public function updateImageIfExist(Request $request, string $oldFileName, callable $callback);

	public function removeImage(string $fileName);

	public function multiUploadImagesIfExist(Request $request, callable $callback);

	public function multiRemoveImagesIfExist(Request $request, callable $callback);

}