<?php

namespace St\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $table = 'services';

	protected $fillable = [
		'title', 'desc', 'keywords', 'text', 'img', 'main_page'
	];

	use MethodGetByIdTrait;

	public function setMainPageAttribute($value)
	{
		$mutate = $value == 'on' ? 1 : 0;
		$this->attributes['main_page'] = $mutate;
	}

}
