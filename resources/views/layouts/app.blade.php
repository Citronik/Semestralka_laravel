<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<script>
    var AuthUser = "{{{ (Auth::user()) ? Auth::user() : null }}}";
</script>

@auth
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
@endauth
<nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-end">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Fortinet</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Fortigate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('presentations.index') }}">Presentations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About us</a>
                </li>
            </ul>
            @if(!Auth::check())
                <script>checkDivForLogged()</script>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-secondary btn active" id="btn" style="margin-bottom: 0px !important" href="{{ route('login') }}">
                            Sign in
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary btn active" id="btn1" style="margin-bottom: 0px !important" href="{{ route('register') }}">
                            Sign up
                        </a>
                    </li>
                </ul>
            @else
                <script>checkDivForLogged()</script>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-secondary btn active" id="btn" style="margin-bottom: 0px !important" href="{{ route('users.update-form') }}">
                            Change personal info
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary btn active" id="btn1" style="margin-bottom: 0px !important" href="{{ route('users.update') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary btn active" id="btn2" style="margin-bottom: 0px !important" href="{{ route('users.delete') }}">
                            <i class="bi bi-x-circle-fill"></i>
                        </a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col">
            @yield('content')
        </div>
    </div>
</div>
<div class="container" style="z-index: 5; position: relative; ">

</div>
<footer class="footer">
    <p>Fortinet</p>
<!--    <div class="C805-Footer-Text">-->
        <div class="row">
                <div class="col-md-3">
                    <div id="logo" class="img-container" style="align-items: center; justify-content: center;" onmouseenter="event.preventDefault(); ">
                        <img class="img-fluid" src="/img/fortilogo.jpg" alt="Fortinet Logo">
                    </div>
                </div>
                <div class="col-md-6">
                    <p>Copyright © 2022 Fortinet, Inc. All Rights Reserved.</p>
                </div>
                <div class="col-md-3">
                    <ul class="be-list">
                        <li class="be-list-item">
                            <p class="mini">sandbox</p>
                        </li>
                        <li class="be-list-item">
                            <p class="mini">Security Operations Center (SOC)</p>
                        </li>
                        <li class="be-list-item">
                            <p class="mini">What is Catfishing Online: Signs &amp; How to Tell</p>
                        </li>
                    </ul>
                </div>
<!--        </div>-->
    </div>
</footer>
</body>
</html>

