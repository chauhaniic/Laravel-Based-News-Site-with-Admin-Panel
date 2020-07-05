<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\Category;

class Category extends Model
{
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function category(){
    	return $this->belongsTo('App\Category','id','name');
    }
}
