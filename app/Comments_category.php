<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments_category extends Model
{
    protected $fillable = ['author','content','category_id','created_at','updated_at'];
    public function categories()
    {
        return $this->belongsTo('Category');
    }
}
