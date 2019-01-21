@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center"> Create a new Category</h2>
        </div>
        <div class="panel-body">
            <form action="{{route('category.store')}}" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name : </label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create Category</button>
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

    {{--<div class="container">--}}
        {{--<h2>Modal Example</h2>--}}
        {{--<!-- Trigger the modal with a button -->--}}
        {{--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>--}}

        {{--<!-- Modal -->--}}
        {{--<div class="modal fade" id="myModal" role="dialog">--}}
            {{--<div class="modal-dialog">--}}

                {{--<!-- Modal content-->--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                        {{--<h4 class="modal-title">Modal Header</h4>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body">--}}
                        {{--<p>Some text in the modal.</p>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}


    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center"> Existing Categories</h2>
        </div>
        <div class="panel-body">

                <table class="table table-responsive table-bordered table-hover">
                      <thead class="thead-dark">
                        <tr>

                          <th scope="col">Id</th>
                          <th scope="col">Name</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col">Created At</th>
                          <th scope="col">Updated At</th>
                        </tr>
                      </thead>
                      <tbody>
                      @if(count($categories)>0)
                            @foreach($categories as $cat)
                                <tr>
                          <td>{{$cat->id}}</td>
                          <td>{{$cat->name}}</td>
                          <td><a class="alert-danger" data-toggle="tooltip" title="Delete the Category" href="{{route('category.delete' ,$cat->id)}}">Remove</a></td>
                          <td><a id="edit-button" href="{{route('category.edit',$cat->id)}}"  data-toggle="tooltip" title="Edit the Category">Edit</a></td>
                          <td>{{$cat->created_at->diffForhumans()}}</td>
                          <td>{{$cat->updated_at->diffForhumans()}}</td>
                                </tr>
                            @endforeach
                      @else
                        <h1>No categories in the database</h1>
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