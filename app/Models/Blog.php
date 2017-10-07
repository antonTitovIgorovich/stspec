<?php

namespace St\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $table = 'blog';
	protected $fillable = ['title', 'desc', 'keywords', 'img_main', 'text'];

	use MethodGetByIdTrait;

	public function images()
	{
		return $this->hasMany('St\Models\Image');
	}
}
