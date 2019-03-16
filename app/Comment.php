<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['author','content','post_id','created_at','updated_at'];
    public function posts()
    {
        return $this->belongsTo('Post');
    }
}
