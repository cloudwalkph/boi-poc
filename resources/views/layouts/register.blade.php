<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-paper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/assets/images/logo.png" alt="">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Right Side Of Navbar -->

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">FORMS</a></li>
                    <li><a href="#">SERVICES</a></li>
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">LOGIN</a></li>
                        <li><a href="{{ route('register') }}">REGISTER</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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

    <div class="content" id="headerImg">
        <div class="img-overlay"></div>
        @if (Auth::guest())
            <div class="registration-text text-center">
                <h1 style="color: #fff;">Alien Certificate</h1>
                <h3 style="color: #fff;">Registration / Renewal</h3>
            </div>
            <img src="/assets/images/id.png" class="registration-img" alt="ID">
        @endif
    </div>

    @if (Auth::guest())
        <div class="content" style="margin: 150px 0">
            @yield('content')
        </div>
    @else
        @yield('content')
    @endif
</div>


<footer class="footer">

    <div class="container-fluid">
        <div class="col-md-3">
            <img src="/assets/images/logo-footer.png" alt="">
        </div>
        <div class="col-md-4 text-center">
            <h6 style="margin: 20px">Copyright 2016 <span class="text-primary">BUREAU OF IMMIGRATION</span> | All Rights Reserved</h6>
        </div>
        <div class="col-md-2">
            <div class="social-icons text-center">
                <i class="fa fa-twitter fa-2x"></i>
                <i class="fa fa-facebook fa-2x"></i>
                <i class="fa fa-youtube fa-2x"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">TERMS</a></li>
                    <li><a href="#">POLICIES</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
