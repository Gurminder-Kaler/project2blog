<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostEditRequest;
use App\Photo;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Session;

class PostsController extends Controller
{
    public function restore($id){
        $post =Post::withTrashed()->whereId($id)->first();
        $post->restore();
        Session::flash('info','Post restored Successfully');
        return redirect()->route('posts.index');
    }

    public function kill($id){
//        $post = Post::withTrashed()->whereId($id)->get();
        $post = Post::withTrashed()->whereId($id)->first();
        $post ->forceDelete();
        unlink(public_path() . $post->photo->featured);
        Session::flash('info','Post deleted permanently from the database');
        return redirect()->route('posts.trashed','post');
    }

    public function index()
    {
        //
        $posts =Post::all();
        $photo =Photo::all();
        return view('admin.posts.index')->with('posts',$posts);  }
    public function create()
    {
        //
        $tags = Tag::all();
        $categories2 =Category::pluck('name','id')->all();
        $categories =Category::all();
        $tags2 = Tag::pluck('tag','id')->all();
        if ($categories2== null && $tags2==null){
            Session::flash('info','You need to create Categories and Tags ');
            return redirect()->back();
        }
        elseif($categories2== null )
        {
            Session::flash('info','Create some categories first');
            return redirect()->back();
        }elseif($tags2 == null)
        {
            Session::flash('info','Create some Tags first');
            return redirect()->back();
        }

        return view('admin.posts.create',compact('categories','tags'));
    }
    public function store(PostRequest $request)
    {             //dd($request->all());
        $input = $request->all();
        $user = Auth::user();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('uploads/posts', $name);
            $photo = Photo::create(['featured'=>$name]);
            $input['photo_id'] = $photo->id;
            $input['slug']=str_slug($request->title);
        }
        //$post = Post::all();
        $post= $user->posts()->create($input);
        $post->tags()->attach($request->tags);

//                $user ->posts()->create($post);

Session::flash('info','Post created successfully');
        return redirect('admin/post/create');

    }
    public function update(PostEditRequest $request, $id)
    {
        $post1 = Post::findorFail($id);
//        if( $file =$request->file('photo_id')){
//            //$featured = $request->featured;
//            $featured_new_name = time() . $file->getClientOriginalName();
//            $file->move('uploads/posts',$featured_new_name);
//            $post->featured = $featured_new_name;
//        }
//        $post->title= $request->title;
//        $post->content=$request['content'];
//        $post->category_id =$request->category_id;
//        $post ->save();
        //
        $input = $request->all();
        $user = Auth::user();
        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('uploads/posts',$name);
            $photo = Photo::create(['featured' => $name]);
            $input['photo_id'] = $photo->id;
            $input['slug']=str_slug($request->title);
        }

        //$input->save();
            $gg= $user->posts()->whereId($id)->first()->update($input);
//        dd($user->posts()->whereId($id));
//        $post1->save($input);
//        $user->posts()->save($input);
        $post1->tags()->sync($request->tags);
        Session::flash('info','Post successfully updated');
//        return redirect()->route('posts.index');
        return redirect()->route('posts.index');
    }







    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
        $post =Post::findorFail($id);
        $user  = Auth::user();
        $photo =Photo::findorFail($id);
//        $categories =Category::pluck('name','id')->all();
        $categories =Category::all();
        $tags = Tag::all();
//       dd($categories);
        return view('admin.posts.edit')->with('post',$post)
                                             ->with('$user',$user)
                                            ->with('categories',$categories)
                                            ->with('tags',$tags);

    }


    public function destroy($id)
    {
        //
        $post = Post::findorFail($id);
        $post->delete();
        Session::flash('info','Post has been deleted and moved to trash!');
        return redirect()->route('posts.index');
    }
    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed',compact('posts'));
    }

}
