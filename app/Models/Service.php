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

	/**
	 * Set the main_page
	 * @param ?int $value
	 */
	public function setMainPageAttribute($value)
	{
		$this->attributes['main_page'] = $value === 'on' ? 1 : null;
	}

}
