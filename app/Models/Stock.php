<?php

namespace St\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
	protected $table = 'stocks';
	protected $fillable = ['title', 'text'];

	use MethodGetByIdTrait;
}
