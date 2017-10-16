<?php

namespace St\Helpers\ImageStorageManager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App;

class ImageStorageManager implements ImageStorageManagerContract
{
	/**
	 * Input name type File
	 * @var string
	 */
	private $inputName = '';
	private $destinationPath = '';
	private $storagePath = '';

	public function __construct()
	{
		/*
		 * Use singleton to Providers\ImageStorageManagerProvider\
		*/
		$this->storagePath = App::make('GetStoragePath');
	}

	/**
	 *
	 * @param string $destinationPath
	 * @return $this
	 */
	public function setDestinationPath(string $destinationPath)
	{
		$this->destinationPath = $destinationPath . "/";
		if (!is_dir($this->storagePath . $destinationPath)) {
			Storage::makeDirectory($destinationPath);
		}
		return $this;
	}

	/**
	 * Set input name to work with request
	 * @param string $name
	 * @return $this
	 */
	public function setInputName(string $name)
	{
		$this->inputName = $name;
		return $this;
	}

	protected function executeUpload($imageObj): string
	{
		$fileName = rand() . '_'
			. time() . "-"
			. $imageObj->getClientOriginalName();

		$path = $this->storagePath . $this->destinationPath . $fileName;

		Image::make($imageObj->getRealPath())
			->resize(600, 500)
			->save($path);

		return $fileName;
	}

	public function uploadImageIfExist(Request $request, callable $callback)
	{
		if ($request->hasFile($this->inputName)) {
			$image = $request->{$this->inputName};
			$filename = $this->executeUpload($image);
			$callback($filename);
		}
		return false;
	}

	public function updateImageIfExist(Request $request, string $oldFileName, callable $callback)
	{
		$this->uploadImageIfExist($request,
			function ($fileName) use ($oldFileName, $callback) {
				$this->removeImage($oldFileName);
				$callback($fileName);
			});
	}

	public function removeImage(string $fileName)
	{
		if (Storage::exists($this->destinationPath . $fileName)) {
			Storage::delete($this->destinationPath . $fileName);
		}
	}

	public function multiUploadImagesIfExist(Request $request, callable $callback)
	{
		if ($request->hasFile($this->inputName)) {

			$images = $request->{$this->inputName};

			$fileNamesArr = array_map(function ($image) {
				return $this->executeUpload($image);
			}, $images);

			$callback($fileNamesArr);
		}
		return false;
	}


	public function multiRemoveImagesIfExist(Request $request, callable $callback)
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