<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-primary navbar-laravel">
        <div class="container text-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li><a class="nav-link" href="{{ route('myblog') }}">My Blog</a></li>
                    <li><a class="nav-link" href="{{ route('serie-bv') }}">Serie Bài Viết</a></li>
                    <li><a class="nav-link" href="{{ route('chuyende') }}">Chuyên Đề</a></li>
                    <li><a class="nav-link" href="{{ route('dichvu') }}">Dịch Vụ</a></li>
                    <li><a class="nav-link" href="{{ route('lienhe') }}">Liên Hệ</a></li>
                    <li><a class="nav-link" href="{{ route('gioithieu') }}">Giới Thiệu</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-primary navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    Háy sống với đam mê.
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li><a class="nav-link" href="{{ route('myblog') }}">My Blog</a></li>
                    <li><a class="nav-link" href="{{ route('serie-bv') }}">Serie Bài Viết</a></li>
                    <li><a class="nav-link" href="{{ route('chuyende') }}">Chuyên Đề</a></li>
                    <li><a class="nav-link" href="{{ route('dichvu') }}">Dịch Vụ</a></li>
                    <li><a class="nav-link" href="{{ route('lienhe') }}">Liên Hệ</a></li>
                    <li><a class="nav-link" href="{{ route('gioithieu') }}">Giới Thiệu</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('breadcrumb')
    </div>
    <main class="py-4">
        @yield('content')
    </main>
    <div class="container">
        @include('layouts.footer');
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
