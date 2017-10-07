<?php

namespace St\Repositories\StockRepo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;

class StockModelRecorder
{
	/**
	 * @var Model;
	 */
	protected $model;
	/**
	 * @var FormRequest
	 */
	protected $request;

	/**
	 * StockModelRecorder constructor.
	 *
	 * @param Model $model
	 * @param FormRequest $request
	 */
	public function __construct(Model $model, FormRequest $request)
	{
		$this->request = $request;
		$this->model = $model;
	}

	public function save()
	{
		$fillableArr = $this->model->getFillable();
		foreach ($fillableArr as $item) {
			$this->model->{$item} = $this->request->{$item};
		}
		$this->model->save();
	}


}