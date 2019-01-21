<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['id','slug','title','photo_id','content','category_id','deleted_at','created_at','updated_at'];

    protected $dates=['deleted_at'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
