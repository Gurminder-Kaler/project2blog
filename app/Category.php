<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name','id','created_at','updated_at'];

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
