<?php

namespace St\Repositories\ServiceRepo;

use Illuminate\Foundation\Http\FormRequest;
use St\Helpers\ModelRecorder\ModelRecorder;
use St\Repositories\GeneralMethodsOfRepoAbstract as GeneralMethods;
use St\Models\Service;

class ServiceRepo
	extends GeneralMethods
	implements ServiceRepoContract
{
	const INPUT_NAME = 'img';
	public $model;
	private $imgFileManager;

	public function __construct()
	{
		$this->model = new Service();

		$imgFileManager = new ServiceImageManagerBuilder();
		$this->imgFileManager = $imgFileManager
			->setInputName(self::INPUT_NAME)
			->build();
	}

	/**
	 * Store
	 * @param FormRequest $request
	 */
	public function store(FormRequest $request)
	{
		$modelRecorder = new ModelRecorder($this->model, $request);

		$callback = function ($imageName) use ($modelRecorder) {
			$modelRecorder->assignValue([self::INPUT_NAME => $imageName]);
		};

		$this->imgFileManager->uploadImageIfExist($request, $callback);

		$modelRecorder->save();
	}

	/**
	 * Update model by id
	 * @param FormRequest $request
	 * @param int $id
	 */
	public function update(FormRequest $request, int $id)
	{
		$model = $this->model->getById($id);
		$modelRecorder = new ModelRecorder($model, $request);

		$callback = function ($newImageName) use ($modelRecorder) {
			$modelRecorder->assignValue([self::INPUT_NAME => $newImageName]);
		};

		$modelRecorder->setIgnoredValue(self::INPUT_NAME);

		$this->imgFileManager->updateImageIfExist($request, $model->img, $callback);

		$modelRecorder->save();

	}

	/**
	 * Delete model by id
	 * @param int $id
	 */
	public function delete(int $id)
	{
		$model = $this->model->getById($id);
		$this->imgFileManager->removeImage($model->img);
		$model->delete();
	}

}
