<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 29.09.17
 * Time: 14:26
 */

namespace St\Helpers\ModelRecorder;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;
use League\Flysystem\Exception;

class ModelRecorder
{
	/**
	 * @var Model
	 */
	protected $model;
	/**
	 * @var FormRequest
	 */
	protected $request;
	/**
	 * @var array
	 */
	protected $fillableArr;

	protected $ignoredValue;

	private $assignValueFlag = false;

	/**
	 * ModelRecorder constructor.
	 * @param Model $model
	 * @param FormRequest $request
	 */
	public function __construct(Model $model, FormRequest $request)
	{
		$this->model = $model;
		$this->request = $request;
	}

	/**
	 * Set Ignored Value
	 * @param string
	 */
	public function setIgnoredValue(string $value)
	{
		$this->ignoredValue = $value;
	}

	/**
	 * Remove item of fillable array.
	 * @param string $item
	 */
	protected function removeItemOfFillableArr(string $item)
	{
		$this->fillableArr = array_diff(
			$this->model->getFillable(), [$item]
		);
	}

	/**
	 * Assign a custom value for fillable value of Model.
	 * @throws
	 * @param array $dataArr [(type string) 'model_some_key'=> (type string|int) 'some_value']
	 */
	public function assignValue(array $dataArr)
	{
		$keyData = array_keys($dataArr)[0];
		$valData = array_values($dataArr)[0];

		if (!in_array($keyData, $this->model->getFillable())) {
			throw new Exception($keyData . " not contained in fillable values of model!");
		}

		$this->model->{$keyData} = $valData;

		$this->removeItemOfFillableArr($keyData);

		$this->assignValueFlag = true;
	}

	/**
	 * Save Model.
	 */
	public function save()
	{
		if ($this->assignValueFlag === false) {
			$this->removeItemOfFillableArr($this->ignoredValue);
		}

		foreach ($this->fillableArr as $item) {
			$this->model->{$item} = $this->request->{$item};
		}

		$this->model->save();
	}

}