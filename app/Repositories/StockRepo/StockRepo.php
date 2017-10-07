<?php

namespace St\Repositories\StockRepo;

use Illuminate\Foundation\Http\FormRequest;
use St\Repositories\GeneralMethodsOfRepoAbstract as GeneralMethods;
use St\Models\Stock;

class StockRepo
	extends GeneralMethods
	implements StockRepoContract
{
	/**
	 * @var Stock;
	 */
	protected $model;

	/**
	 * StockRepo constructor.
	 */
	public function __construct()
	{
		$this->model = new Stock();
	}

	/**
	 * @param FormRequest $request
	 */
	public function store(FormRequest $request)
	{
		$modelRecorder = new StockModelRecorder($this->model, $request);
		$modelRecorder->save();
	}

	/**
	 * @param FormRequest $request
	 * @param int $id
	 */
	public function update(FormRequest $request, int $id)
	{
		$model = $this->model->getById($id);
		$modelRecorder = new StockModelRecorder($model, $request);
		$modelRecorder->save();
	}

	/**
	 * @param int $id
	 * @return mixed
	 */
	public function delete(int $id)
	{
		$model = $this->model->getById($id);
		$model->delete();
	}

}