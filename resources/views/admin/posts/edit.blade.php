@extends('layouts.app')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center"> Edit the Post : {{$post->title}}</h2>

        </div>
        <div class="panel-body">
            <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
                <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" value="{{$post->title}}" name="title">
            </div>
            <div class="form-group">
            <label for="category">Select a Category</label>
            <select class="form-control" id="category" name="category_id">
            @foreach($categories as $cat)
            <option value="{{$cat->id}}"
            @if($post->category->id == $cat->id)
                selected
                @endif
            >{{$cat->name}}</option>
            @endforeach
            </select>
            </div>
            <div class="form-group">
            <label for="featured">Featured Image</label>
            <input type="file" class="form-control"  name="photo_id">
            </div>
                <div class="form-group">
                    <ul class=" list-group list-inline"  style="list-style: none">Select Tags :

                        {{--{{$post->tags}}--}}
                    @foreach($tags as $tag)

                    <li class="list-group-item" >
                    <label>

                    <input type="checkbox" name="tags[]" id="{{$tag->id}}" value="{{$tag->id}}"
                    @foreach($post->tags as $t)
                    @if($tag->id == $t->id)
                    checked
                    @endif
                    @endforeach
                    >
                    {{$tag->tag}}
                    </label>
                    </li>
                    @endforeach


                    </ul>
                </div>

            <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" rows="5" cols="5" class="form-control"  name="content">{{$post->content}}</textarea>
            </div>
            <div class="form-group">
            <div class="text-center">
            <button class="btn btn-success" type="submit">Store Post</button>
            </div>

            </div>

            </form>
            {{--{!! Form::model($post1,['method'=>'patch','action'=>['PostsController@update',$post1->id],'files'=>true]) !!}--}}
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{--{{ csrf_field() }}--}}
            {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-2"></div>--}}
                {{--<div class="col-md-8">--}}
                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('title','Enter Title') !!}--}}
                        {{--{!! Form::text('title', null,['class'=>'form-control']) !!}--}}
                    {{--</div>--}}
                    {{--<br>--}}
                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('photo_id', 'Add Photo:') !!}--}}
                        {{--{!! Form::file('photo_id', null,['class'=>'form-control'])!!}--}}
                    {{--</div>--}}
                    {{--<br>--}}

                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('category_id', 'Select Category:') !!}--}}
                        {{--{!! Form::select('category_id',$categories, null, ['class'=>'form-control'])!!}--}}
                    {{--</div>--}}
                    {{--<br>--}}
                    {{--<div class="form-group">--}}
                        {{--<ul class=" list-group list-inline"  style="list-style: none">Select Tags :--}}


                            {{--@foreach($tags as$tag)--}}
                                {{--<li class="list-group-item" >--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="tags[]" id="{{$tag->id}}" value="{{$tag->id}}"--}}
                                        {{--@foreach($post1->tags as $t)--}}
                                        {{--@if($tag->id == $t->id)--}}
                                                {{--checked--}}
                                        {{--@endif--}}
                                        {{--@endforeach--}}
                                        {{-->--}}
                                        {{--{{$tag->tag}}--}}
                                    {{--</label>--}}
                                {{--</li>--}}
                            {{--@endforeach--}}


                        {{--</ul>--}}

                        {{--{!! Form::select('category_id',$categories, null, ['class'=>'form-control'])!!}--}}
                    {{--</div>--}}
                    {{--<br>--}}
                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('content','Enter Content') !!}--}}
                        {{--{!! Form::textarea('content', null,['class'=>'form-control','cols'=>5,'rows'=>5,'style'=>'resize:vertical']) !!}--}}
                    {{--</div>--}}


                {{--</div>--}}
                {{--<input placeholder="Enter title here" type="text" class="form-control" name="title">--}}
                {{--<input placeholder="Enter content here" type="text" class="form-control" name="content">--}}

                {{--<button type="submit"  name="submit" class="btn btn-success">Submit</button>--}}
            {{--</div>--}}
            {{--<div class="col-md-2">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-4"></div>--}}

                {{--<div class="col-md-4">--}}
                    {{--{!! Form::submit('Edit Post',['class'=>'btn btn-block btn-success' ]) !!}--}}
                {{--</div>--}}


            {{--</div>--}}

            {{--{!! Form::close() !!}--}}
        </div>
        <div class="panel-footer">

            @include('includes.error')

        </div>

    </div>

@endsection