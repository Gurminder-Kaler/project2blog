@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center"> Create a new Tag</h2>
        </div>
        <div class="panel-body">
            <form action="{{route('tags.store')}}" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Tag : </label>
                    <input type="text" class="form-control" name="tag">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create Tag</button>
                    </div>

                </div>

            </form>
        </div>
        <div class="panel-footer">

            @include('includes.error')

        </div>

    </div>
    <hr>
    <div class="flex-center">

        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @elseif(Session::has('deleted'))
            <div class="alert alert-danger" role="alert">
                "{{Session::get('deleted')}}
            </div>
        @elseif(Session::has('info'))
            <div class="alert alert-info" role="alert">
                {{Session::get('info')}}
            </div>


        @endif
    </div>
    <hr>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center"> Existing Tags</h2>
        </div>
        <div class="panel-body">

            <table class="table table-responsive table-bordered table-hover">
                <thead class="thead-dark">
                <tr>

                    <th scope="col">Id</th>
                    <th scope="col">Tag</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                </tr>
                </thead>
                <tbody>
                @if(count($tags)>0)
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->tag}}</td>
                            <td><a class="alert-danger" data-toggle="tooltip" title="Delete the Tag" href="{{route('tags.delete' ,$tag->id)}}">Remove</a></td>
                            <td><a id="edit-button" href="{{route('tags.edit',$tag->id)}}"  data-toggle="tooltip" title="Edit the Tag">Edit</a></td>
                            <td>{{$tag->created_at->diffForhumans()}}</td>
                            <td>{{$tag->updated_at->diffForhumans()}}</td>
                        </tr>
                    @endforeach
                @else
                    <h1>No Tags in the database</h1>
                @endif

                </tbody>
            </table>

        </div>
    </div>
    <hr>




@endsection
@section('scripts')
    <script src="js/edit.js"></script>
@endsection