@extends('layouts.app')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center"> Recycle BIN</h2>
        </div>
        <div class="panel-body">

            <table class="table table-responsive table-bordered table-hover">
                <thead class="thead-dark">
                <tr>

                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Category</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Created At</th>
                    {{--<th scope="col">Updated At</th>--}}
                </tr>
                </thead>
                <tbody>
                {{--{{$photo->featured}}--}}
                {{--{{$photo->featured}}--}}
                @if(count($posts)>0)
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->content}}</td>
                            <td>{{$post->category->name}}</td>
                            {{--<td>{{$post->featured}}</td>--}}
                            <td><img height="50px" width="50px" src="{{$post->photo ? $post->photo->featured:'http://placehold.it/150x150'}}" alt=""/></td>
                            <td><a class="alert-danger" data-toggle="tooltip" title="Delete permanently from Db" href="{{route('post.kill' ,$post->id)}}">Get rid <span class="fa fa-remove"></span></a>
                                <br>
                                <a id="edit-button" href="{{route('post.restore',$post->id)}}"  data-toggle="tooltip" title="Restore the Post">Restore <span class="fa fa-recycle"></span></a>
                            </td>

                            {{--<td><a id="edit-button" href="{{route('post.edit',$post->id)}}"  data-toggle="tooltip" title="Edit the Post">Edit</a></td>--}}
                            <td>{{$post->created_at->diffForhumans()}}</td>
                            {{--<td>{{$post->updated_at->diffForhumans()}}</td>--}}
                        </tr>
                    @endforeach
                @else
                    <h1>No Posts in the Trash</h1>
                @endif

                </tbody>
            </table>

        </div>
    </div>
    <hr>

@endsection