<?php

namespace St\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'title', 'desc', 'text', 'img', 'main_page'
    ];

}