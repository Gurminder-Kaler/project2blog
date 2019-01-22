@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center"> Create a new User</h2>
        </div>
        <div class="panel-body">
            <form action="{{route('user.store')}}" method="post" >
                {{csrf_field()}}

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">UserName : </label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="name">email : </label>
                                    <input type="email" class="form-control" name="email">
                                </div>

                            </div>
                            <div class="col-md-4"></div>

                        </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create User</button>
                    </div>

                </div>

            </form>
        </div>
        <div class="panel-footer">

            @include('includes.error')

        </div>

    </div>
    @endsection