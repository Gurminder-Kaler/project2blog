@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">Edit Your Profile</h2>
        </div>
        <div class="panel-body">
            <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data" >
                {{csrf_field()}}

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-7 ">
                                <div class="form-group">
                                    <label for="name">UserName : </label>
                                    <input value="{{$user->name}}" type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">email : </label>
                                    <input value="{{$user->email}}" type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-md-5 text-center">
                                <img src="{{asset($user->profile->avatar)}}" width="100px" height="100px" style="border-radius: 50%;margin-top: 17px" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password : </label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label for="file">Upload New Avatar : </label>
                            <input type="file" class="form-control" name="avatar">
                        </div>

                        <div class="form-group">
                            <label for="facebook">Facebook Profile : </label>
                            <input value="{{$user->profile->facebook}}" type="text" class="form-control" name="facebook">
                        </div>

                        <div class="form-group">
                            <label for="youtube">Youtube Profile : </label>
                            <input value="{{$user->profile->youtube}}" type="text" class="form-control" name="youtube">
                        </div>

                        <div class="form-group">
                            <label for="about">About you : </label>
                            <textarea cols="5" id="about" rows="5" class="form-control" style="resize: vertical" name="about">{{$user->profile->about}}</textarea>
                        </div>

                    </div>
                    <div class="col-md-2"></div>

                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Profile Info</button>
                    </div>

                </div>

            </form>
        </div>
        <div class="panel-footer">

            @include('includes.error')

        </div>

    </div>
@endsection