<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- BS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- FW -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', ) }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- soon seach bar here. show if the usr logs in ---}}
                    @auth

                    @if(!request()->is('admin/*'))
                    <ul class="navbar-nav me-auto">
                        <form action="{{ route('search') }}"  style="width: 300px;">
                            <input type="search" name="search" id="search" class="form-control form-control-sm" placeholder="Search...">
                        </form>
                    </ul>
                    @endif
                    @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        {{---home --}}
                        <li class="nav-item" title="Home">
                                <a href="{{ route('index')}}" class="nav-link"><i class="fa-solid fa-house text-dark  icon-sm"></i></a>
                        </li>
                        {{---Create Post--}}
                        <li class="nav-item" title="Create Post">
                                <a href="{{route('post.create')}}" class="nav-link"><i class="fa-solid fa-circle-plus text-dark icon-sm"></i></a>
                        </li>

                        {{--Account--}}
                            <li class="nav-item dropdown">
                                <button id="account-dropdown" class="btn shadow-none nav-link" data-bs-toggle="dropdown">
                                        @if(Auth::user( )->avatar)
                                        <img src="{{ Auth::user( )->avatar }}" alt="{{ Auth::user( )->name }}" class="rounded-circle avatar-sm">
                                        @else
                                        <i class="fa-solid fa-circle-user text-dark icon-sm"></i>
                                        @endif
                                </button>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        {{--admin controls---}}
                                        @can('admin')
                                            <a href="{{ route('admin.users') }}" class="dropdown-item ">
                                                <i class="fa-solid fa-user-gear"></i>
                                            </a>
                                            <hr class="dropdown-divider">
                                        @endcan
                                        {{--profile--}}
                                        <a href="{{ route('profile.show', Auth::user( )->id) }}" class="dropdown-item">
                                                <i class="fa-solid fa-circle-user"></i>profile
                                        </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i>{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
                <div class="container">
                        <div class="row justify-content-center">
                                {{--admin controls --}}
                                @if(request( )->is('admin/*'))
                                    <div class="col-3">
                                        <div class="list-group">
                                            <a href="{{ route('admin.users') }}" class="list-group-item {{ request( )->is('admin/users') ? 'active' : '' }}">
                                                <i class="fa-solid fa-users me-2"></i>Users
                                            </a>
                                            <a href="{{ route('admin.posts') }}" class="list-group-item {{ request( )->is('admin/posts') ? 'active' : '' }}">
                                                <i class="fa-solid fa-newspaper me-2"></i>Posts
                                            </a>
                                            <a href="{{ route('admin.categories') }}" class="list-group-item {{ request( )->is('admin/categories') ? 'active' : '' }}">
                                                <i class="fa-solid fa-tags me-2"></i>Categories
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                {{--col-3--}}
                                <div class="col-9">
                                           @yield('content')
                                </div>
                        </div>
                </div>
  
        </main>
    </div>
</body>
</html>
