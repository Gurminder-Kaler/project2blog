<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    {{--<link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">--}}
    @yield('styles')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
@if(Session::has('info'))
   <div class="alert alert-info">
       {{Session::get('info')}}
   </div>
@elseif(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif




    <div id="app">

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                @if(Auth::check())
                <div class="col-lg-3 ">
                    <ul class="list-group ">
                        <li class="list-group-item">
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        @if(Auth::user()->admin)
                        <li class="list-group-item list-group-item-info">
                            <a href="{{route('users')}}">Users</a>
                        </li>
                        <li class="list-group-item list-group-item-info">
                            <a href="{{route('users.create')}}">Create Users</a>
                        </li>
                        @endif

                        <li class="list-group-item list-group-item-info">
                            <a href="{{route('user.profile')}}">My Profile</a>
                        </li>
                        <li class="list-group-item ">
                            <a href="{{route('post.create')}}">Create new Post</a>
                        </li>
                        <li class="list-group-item list-group-item-info">
                            <a href="{{route('posts.index')}}">View/Edit/Delete Posts</a>
                        </li>
                        <li class="list-group-item ">
                            <a href="{{route('posts.trashed')}}">Trash for Posts <span class="fa fa-trash"></span></a>
                        </li>
                        <li class="list-group-item list-group-item-info" >
                            <a href="{{route('category.create')}}">Create/View/Edit/Delete Categories</a>
                        </li>
                        <li class="list-group-item " >
                            <a href="{{route('tags.create')}}">Create/View/Edit/Delete Tags</a>
                        </li>
                    </ul>
                </div>
                @endif
                <div class="col-lg-9">
                    @yield('content')
                </div>
            </div>
        </div>


        </div>

@yield('scripts')

    <script>
        @if(Session::has('info'))
        toastr.info('{{Session::get('info')}}');
        @elseif(Session::has('success'))
        toastr.success('{{Session::get('success')}}');
        @endif
    </script>
    <!-- Scripts -->
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    {{--<script src="{{asset('js/toastr.min.js')}}"></script>--}}
</body>
</html>
