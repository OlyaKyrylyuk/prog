<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','description'];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function comments2()
    {
        return $this->hasMany(Comments_category::class);
    }
}
