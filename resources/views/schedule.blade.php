@extends('layouts.app')

@section('content')
    <div class="content" id="scheduleImg">
<<<<<<< HEAD
        <div class="img-overlay"></div>
=======
        <div class="auth-overlay"></div>
>>>>>>> origin/master
        <div class="schedule-heading">
            <h1 style="color: #fff">Schedule your Appointment</h1>
        </div>
    </div>

    <div class="content" style="margin: 100px 0">
        <div class="container">
            <div class="row">

                <div class="col-md-10 col-md-offset-1">
                    <h4>Select an authorized BI office</h4>

                    <select name="immigration_office" id="immigration_office" class="form-control">
                        <option value="1">Bureau of Immigration Main Office</option>
                        <option value="2">SM Tarlac Immigration Test</option>
                    </select>

                    <p class="text-center" style="margin: 20px 0;font-size: 15px;">
                        Select a date and select whether you want an
                        <b class="text-primary">AM</b> or <b class="text-primary">PM</b> appointment.
                    </p>
                </div>

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="calendar"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="panel panel-default schedule-summary">
                        <div class="panel-body">

                           <div class="col-md-8">
                               <h3>YOU SELECTED</h3>

                               <p style="font-size: 15px;">
                                   May 25, 2017, Thursday PM <br>
                                   <span style="font-size: 15px;" class="text-primary">
                                       Bureau of Immigration Main Office
                                   </span> <br>
                                   Magallanes Drive, Intramuros Manila 1002
                               </p>
                           </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary btn-block" style="margin-top: 60px;">Cancel</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="panel panel-default schedule-payment-breakdown">
                        <div class="panel-body">

                            <div class="col-md-12" style="padding: 30px;">
                                <h3>PAYMENT BREAKDOWN</h3>
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <td>Visa Waiver</td>
                                            <td class="text-right">Php 500.00</td>
                                        </tr>
                                        <tr>
                                            <td>Visa Waiver Application Fee</td>
                                            <td class="text-right">1000.00</td>
                                        </tr>
                                        <tr>
                                            <td>Certification Fee</td>
                                            <td class="text-right">500.00</td>
                                        </tr>
                                        <tr>
                                            <td>Legal Research Fee (LRF) for each immigration fee except Head Tax and Fines</td>
                                            <td class="text-right">30.00</td>
                                        </tr>
                                        <tr>
                                            <td>Express Fee</td>
                                            <td class="text-right">1000.00</td>
                                        </tr>
                                        <tr>
                                            <td>Fine for Overstaying - (additional)</td>
                                            <td class="text-right">1000.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12 note-payment">
                                <h5>NOTE: Additional Fee of 250 pesos to use this web service</h5>
                            </div>

                            <div class="col-md-12" style="padding: 30px;">
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <td class="text-primary"><strong>TOTAL</strong></td>
                                            <td class="text-primary text-right"><strong>Php 4,280.00</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <p>*Fees are updated as of 06 March 2014 and may change without prior notice.</p>
                </div>

                <div class="col-md-12">
                    <h2>Mode of payment</h2>
                    <h4 class="text-primary">Choose how you pay</h4>
                    <p>
                        For your convenience, various payment facilities are readily available. You can choose to pay with your
                        credit card online or use your Bancnet card and pay thru an ATM. Payments are also accepted through GCash.
                    </p>

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="cc-selector">

                                <div class="col-md-6">
                                    <label class="input-parent" for="masterCard">
                                        <input type="radio" name="payment_method" id="masterCard"/>
                                        <label class="drinkcard-cc masterCard" for="masterCard"></label>
                                        <h3 style="position: absolute; top: 20%; left: 55%;">
                                            Master Card
                                        </h3>
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <label class="input-parent" for="paypal">
                                        <input type="radio" name="payment_method" id="paypal"/>
                                        <label class="drinkcard-cc paypal" for="paypal"></label>
                                        <h3 style="position: absolute; top: 20%; left: 55%;">
                                            Paypal
                                        </h3>
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <label class="input-parent" for="bancnet">
                                        <input type="radio" name="payment_method" id="bancnet"/>
                                        <label class="drinkcard-cc bancnet" for="bancnet"></label>
                                        <h3 style="position: absolute; top: 20%; left: 55%;">
                                            Bancnet
                                        </h3>
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <label class="input-parent" for="gcash">
                                        <input type="radio" name="payment_method" id="gcash"/>
                                        <label class="drinkcard-cc gcash" for="gcash"></label>
                                        <h3 style="position: absolute; top: 20%; left: 55%;">
                                            GCash
                                        </h3>
                                    </label>
                                </div>

                            </div>

                        </div>
<<<<<<< HEAD

                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-9">
                                <button type="submit" class="btn btn-primary btn-block">
=======
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-9">
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#offerIdModal">
>>>>>>> origin/master
                                    CHECKOUT
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
=======
    @include('modals.offer')
>>>>>>> origin/master

@endsection

@section('scripts')
    <script>
        $('.calendar').fullCalendar({
            header: {
                right: 'prev,next today',
                center: 'title',
                left: ''
            },
            navLinks: true, // can click day/week names to navigate views
            // businessHours: true, // display business hours
            editable: true,
            // events: events
        });
    </script>
@endsection
