<?php

namespace St\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['*'];
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('St\Models\User');
    }

}
