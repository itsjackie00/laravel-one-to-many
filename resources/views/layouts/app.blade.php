<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="../components/_navbar.css">

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <div id="app">
        <header class="header">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
                <div class="container px-4 px-lg-5">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Laravel Portfolio
                    </a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
                                @auth
                                <li class="nav-item">
                                   <a class="nav-link" href="{{ route('projects.index') }}">Progetti</a>
                                </li>
                                @endauth
                            </ul>
                            <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            @auth
                            <li class="nav-item">
                               <a class="nav-link" href="{{ route('projects.create') }}">Nuovo Progetto</a>
                            </li>
                            @endauth
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
                                    {{ Auth::user()->name }}
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('admin/dashboard') }}">{{__('Dashboard')}}</a>
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                </a>
                            </li>
                            @auth
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Logout')}}</a>
                                </li>
                            </ul>
                            @endauth
            </nav>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
    </div>
    @endguest

    <main class="py-4">
        @yield('content')
    </main>

    </header>
    </div>

</body>

</html>