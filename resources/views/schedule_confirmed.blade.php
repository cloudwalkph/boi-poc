@extends('layouts.app')

@section('content')
    <div class="content" id="scheduleConfirmedImg">
        <div class="auth-overlay"></div>
        <div class="schedule-confirmation-heading">
            <h1 style="color: #fff">Your appointment is confirmed!</h1>
        </div>
    </div>

    <div class="content" style="margin: 100px 0">
        <div class="container">
            <div class="row">

                <div class="col-md-12 text-center">
                    <p>Thank you for patronizing our online scheduling system! Your
                        scheduled appointment is on <span class="text-primary">May 25, 2017</span></p>
                    <p>Please come in proper attire with bring all your documentary requirements
                        <a href="#">Checklist</a></p>

                    <a href="/home" class="btn btn-primary">BACK TO PROFILE</a>
                </div>


            </div>
        </div>
    </div>
@endsection
