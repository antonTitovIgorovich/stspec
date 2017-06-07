<?php

namespace St\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable = ['title', 'desc', 'img_main', 'text'];

    public function images()
    {
        return $this->hasMany('St\Models\Image');
    }

    public function comments()
    {
        return $this->hasMany('St\Models\Comment');
    }

}
