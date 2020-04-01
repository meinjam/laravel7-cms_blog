<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container py-4">
            <div class="row">
                @if (Auth::check())
                <div class="col-md-4 mb-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('home') }}" class="btn btn-success btn-block">Home</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('my.profile') }}" class="btn btn-warning btn-block">My Profile</a>
                        </li>
                        
                        @if (Auth::user()->admin)
                        <li class="list-group-item">
                            <div class="dropdown">
                                <button class="btn btn-danger btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Users
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('all.users') }}">All users</a>
                                    <a class="dropdown-item" href="{{ route('create.user') }}">Add new user</a>
                                </div>
                            </div>
                        </li>
                        @endif

                        <li class="list-group-item">
                            <div class="dropdown">
                                <button class="btn btn-info btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Categories
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('category.index') }}">All Categories</a>
                                    <a class="dropdown-item" href="{{ route('category.create') }}">Add new category</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="dropdown">
                                <button class="btn btn-dark btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Posts
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('all.posts') }}">All posts</a>
                                    <a class="dropdown-item" href="{{ route('create.post') }}">Create new post</a>
                                    <a class="dropdown-item" href="{{ route('trashed.post') }}">Trashed posts</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="dropdown">
                                <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Tags
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('all.tags') }}">All tags</a>
                                    <a class="dropdown-item" href="{{ route('create.tag') }}">Create tag</a>
                            </div>
                        </li>
                        @if (Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{ route('settings') }}" class="btn btn-dark btn-block">Settings</a>
                            </li>
                        @endif
                    </ul>
                </div>
                    
                @endif
                <div class="col-md-8 mx-auto">
                    @include('layouts.message')
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
