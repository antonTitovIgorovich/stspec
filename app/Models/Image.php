<?php

namespace St\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['title', 'desc', 'file_path', 'blog_id'];
}
