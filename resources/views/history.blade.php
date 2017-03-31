@extends('layouts.app')

@section('content')
    <div class="content" id="scheduleConfirmedImg">
        <div class="auth-overlay"></div>
        <div class="schedule-confirmation-heading">
            <h1 style="color: #fff">Visa History</h1>
        </div>
    </div>

    <div class="content" style="margin: 50px 0">
        <div class="container">
            <div class="row">

                <div class="col-md-12 text-center">
                    <p>We track and saved all the activity you made with this platform to help you
                        monitor them. Check the list or serach by keyword to find an activity.</p>

                    <table class="table table-hover" style="font-size: 16px; margin-top: 50px">
                        <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Activity</th>
                                <th class="text-center">Reference Number</th>
                                <th class="text-center">Authorized BOI Office</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>February 22, 2017</td>
                                <td>Extended for 30 days</td>
                                <td>R3157956</td>
                                <td>Main Office</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
@endsection
