<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bureau of Immigration</title>

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
        </div>
    </nav>

    <div id="auth">
        <div class="col-md-6" id="authImg">
            <div class="auth-overlay"></div>
            @include('auth.login')
        </div>
        <div class="col-md-6">
            @include('auth.register')
        </div>
    </div>
    @include('components.footer')

</div>



<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
