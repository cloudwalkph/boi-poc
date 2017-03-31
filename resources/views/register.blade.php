@extends('layouts.auth')

@section('content')
    <div id="auth">
        <div class="col-md-6" id="authImg">
            <div class="auth-overlay"></div>
            @include('auth.login')
        </div>
        <div class="col-md-6">
            @include('auth.register')
        </div>
    </div>
@endsection