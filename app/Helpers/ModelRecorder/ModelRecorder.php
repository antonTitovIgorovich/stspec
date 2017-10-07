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
	protected $modifiedFillableArr;

	protected $ignoredValue;

	private $assignValueState = false;

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

	public function setIgnoredValue(string $value)
	{
		$this->ignoredValue = $value;
	}

	/**
	 * Remove item of fillable array.
	 * @param string $item
	 */
	public function setModifiedFillableArr(string $item)
	{
		$this->modifiedFillableArr = array_diff(
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
		$fillableArr = $this->model->getFillable();
		foreach ($dataArr as $key => $val) {
			$this->model->{$key} = $val;
			$this->setModifiedFillableArr($key);
			$this->assignValueState = true;

			if (!in_array($key, $fillableArr)) {
				throw new Exception($key . " not contained in fillable values of model!");
			}
		}
	}

	/**
	 * Save Model.
	 */
	public function save()
	{
		if ($this->assignValueState === false) {
			$this->setModifiedFillableArr($this->ignoredValue);
		}

		foreach ($this->modifiedFillableArr as $item) {
			$this->model->{$item} = $this->request->{$item};
		}

		$this->model->save();
	}

}