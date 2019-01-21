<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    protected $uploads ='/uploads/posts/';
//    protected $uploads = '/uploads/posts';

    protected $fillable =['featured','id'];

    public function getFeaturedAttribute($featured){

        return $this->uploads . $featured;

    }
}
