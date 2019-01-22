@extends('layouts.app')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">Users Index</h2>
        </div>
        <div class="panel-body">

            <table class="table table-responsive table-bordered table-hover">
                <thead class="thead-dark">
                <tr>

                    <th scope="col">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Permission</th>
                    {{--<th scope="col"></th>--}}
                    <th scope="col">Created At</th>
                    {{--<th scope="col">Updated At</th>--}}
                </tr>
                </thead>
                <tbody>
                {{--{{$photo->featured}}--}}
                {{--{{$photo->featured}}--}}
                @if(count($users)>0)
                    @foreach($users as $user)
                            <tr  @if($user->admin)
                                 style="background: darkslateblue;color: white"
                                    @else
                                 style="background: #fff"
                                 @endif
                                >
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}} <span class="pull-left"><img src="{{asset($user->profile->avatar)}}" width="60px" height="60px" style="border-radius: 50%" alt=""></span></td>
                                <td>@if($user->admin)
                                        ADMINISTRATOR <a class="btn btn-default btn-danger pull-right" href="{{route('user.not.admin',['id'=>$user->id])}}"> Remove Admin privilages</a>
                                    @else
                                        Not-Admin : <a class="btn btn-default pull-right" href="{{route('user.admin',['id'=>$user->id])}}">Make Admin</a>
                                    @endif
                                </td>
                                {{--<td><a href="{{route('user.delete')}}"><div class="fa fa-trash"></div></a></td>--}}
                                <td>{{$user->created_at->diffForhumans()}}</td>
                            </tr>

                    @endforeach
                @else
                    <h1>No Users in the database</h1>
                @endif

                </tbody>
            </table>

        </div>
    </div>
    <hr>

@endsection