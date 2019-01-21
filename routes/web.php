<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test',function(){
    return App\User::find(1)->user;
});
Route::get('/test2',function () {
    return App\Post::find(16)->tags;
});

Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){


    Route::get('/home',
        [
            'uses'=>'HomeController@index',
            'as'=>'home'
        ]);
/////////////////////////////Post ROUTES//////////////////////

    Route::get('/post/create',[
        'uses'=>'PostsController@create',
        'as'=>'post.create'
    ]);
    Route::get('/posts/index',[
       'uses'=>'PostsController@index',
       'as'=>'posts.index'
    ]);
    Route::get('/post/edit/{id}',[
        'uses'=>'PostsController@edit',
        'as'=>'post.edit'
        ]);
    Route::post('/post/update/{id}',[
        'uses'=>'PostsController@update',
        'as'=>'post.update'
    ]);
    Route::get('/posts/trash',[
        'uses'=>'PostsController@trashed',
        'as'=>'posts.trashed'
    ]);
    Route::get('/posts/kill/{id}',[
        'uses'=>'PostsController@kill',
        'as'=>'post.kill'
    ]);

    Route::get('/posts/restore/{id}',[
        'uses'=>'PostsController@restore',
        'as'=>'post.restore'
    ]);
    Route::get('/post/delete/{id}',[
        'uses'=>'PostsController@destroy',
        'as'=>'post.delete'
    ]);
    Route::post('/post/store',[
        'uses'=>'PostsController@store',
        'as'=>'post.store'
    ]);
    //////////////////////////////CATEgory Routes////////////////////////////////
    Route::get('/category/create',[
        'uses'=>'CategoryController@create',
        'as'=>'category.create'
    ]);
    Route::post('/category/store',[
        'uses'=>'CategoryController@store',
        'as'=>'category.store'
    ]);
    Route::get('/category/create',[
        'uses'=>'CategoryController@index',
        'as'=>'category.create'
    ]);
    Route::get('/category/delete/{id}',[
        'uses'=>'CategoryController@destroy',
        'as'=>'category.delete'
    ]);
    Route::post('/category/update/{id}',[
        'uses'=>'CategoryController@update',
        'as'=>'category.update'
    ]);

    Route::get('/category/{id}/edit',[
        'uses'=>'CategoryController@edit',
        'as'=>'category.edit'
    ]);
    ////////////////////////////TAGS routes/////////////////////////
    Route::get('/tags/index',[
        'uses'=>'TagsController@index',
        'as'=>'tags.index'
    ]);
    Route::get('/tags/edit/{id}',[
        'uses'=>'TagsController@edit',
        'as'=>'tags.edit'
    ]);
    Route::get('/tags/delete/{id}',[
        'uses'=>'TagsController@destroy',
        'as'=>'tags.delete'
    ]);
    Route::get('/tags/create', [
        'uses'=>'TagsController@index',
        'as'=>'tags.create'
        ]);
    Route::post('/tags/store',[
        'uses'=>'TagsController@store',
        'as'=>'tags.store'
    ]);
    Route::post('/tags/update/{id}',[
        'uses'=>'TagsController@update',
        'as'=>'tags.update'
    ]);
});
