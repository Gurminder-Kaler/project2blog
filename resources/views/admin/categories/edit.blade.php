@extends('layouts.app')
@section('content')
<div id="edit-panel">
    <div class="panel panel-default" >
        <div class="panel-heading">
            <h2 class="text-center">Edit a category</h2>
        </div>
        <div class="panel-body">
            <form action="{{route('category.update',$edit->id)}}" method="post" >
            {{csrf_field()}}
            <div class="form-group">
            <label for="name">Name : </label>
            <input type="text"  value="{{$edit->name}}" class="form-control" name="name">
            </div>

            <div class="form-group">
            <div class="text-center">
            <button class="btn btn-success" type="submit">Update</button>
            </div>

            </div>

            </form>
        </div>
        <div class="panel-footer">

            @include('includes.error')

        </div>

    </div>
</div>
    @endsection