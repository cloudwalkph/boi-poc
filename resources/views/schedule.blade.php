@extends('layouts.app')

@section('styles')
    <style>
        .fc-content {
            text-align: center;
        }

        .fc-content:hover {
            background-color: #aca36c;
        }

        .fc-content:active {
            background-color: #aca36c;
        }
    </style>
@endsection

@section('content')
    <div class="content" id="scheduleImg">
        <div class="auth-overlay"></div>
        <div class="schedule-heading">
            <h1 style="color: #fff">Schedule your Appointment</h1>
        </div>
    </div>

    <div class="content" style="margin: 100px 0">
        <div class="container">
            <div class="row">

                <div class="col-md-10 col-md-offset-1">
                    <h4>Select an authorized BI office</h4>

                    <select name="branch_id" id="branch_id" class="form-control">
                        <option value="0" selected>Select a branch</option>
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
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
                                   <span id="selectedDate">May 25, 2017, Thursday PM</span> <br>
                                   <span id="selectedBranch" style="font-size: 15px;" class="text-primary">
                                       Bureau of Immigration Main Office
                                   </span> <br>
                                   <span id="selectedBranchAddress">
                                       Magallanes Drive, Intramuros Manila 1002
                                   </span>
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
                                        {{--<tr>--}}
                                            {{--<td>Fine for Overstaying - (additional)</td>--}}
                                            {{--<td class="text-right">1000.00</td>--}}
                                        {{--</tr>--}}
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
                                            <td class="text-primary text-right"><strong>Php 3,280.00</strong></td>
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
                                    <label class="input-parent" for="dragonpay">
                                        <input type="radio" name="payment_method" id="dragonpay"/>
                                        <label class="drinkcard-cc dragonpay" for="dragonpay"></label>
                                        <h3 style="position: absolute; top: 20%; left: 55%;">
                                            DragonPay
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
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-9">
                                <button type="button" class="btn btn-primary btn-block btnProceed" data-toggle="modal" data-target="#offerIdModal">
                                    CHECKOUT
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('modals.offer')

@endsection

@section('scripts')
    <script>
        $(function() {
            let selectedBranchId = $('#branch_id');
            let selectedEventObject = null;
            let paymentMethod = 'paypal';

            $('.btnProceed').on('click', function() {
                    $('#selectedBranchId').val(selectedBranchId);
                    $('#selectedAppointmentDate').val(selectedEventObject.start.format('YYYY-MM-DD'));
                    $('#selectedAppointmentTime').val(selectedEventObject.time);
                    $('#selectedPaymentMethod').val(paymentMethod);
            });

            $('.calendar').fullCalendar({
                header: {
                    right: 'prev,next today',
                    center: 'title',
                    left: ''
                },
                navLinks: true, // can click day/week names to navigate views
                // businessHours: true, // display business hours
                editable: true,
                eventRender: function(event, element) {
                    let $title = element.find( '.fc-title' );
                    $title.html( $title.text() );
                },
                eventColor: '#48A6F3',
                viewRender: function (view, element) {
                    let b = $('.calendar').fullCalendar('getDate');
                    let date = b.format('YYYY-MM-DD');

                    let branchId = $('#branch_id').val();

                    if (branchId > 0) {
                        $('.calendar').fullCalendar('removeEvents');
                        axios.get(`/api/v1/branches/${branchId}/slots?date=${date}`).then((res) => {
                            $('.calendar').fullCalendar('renderEvents', res.data, true);
                        });
                    }
                },
                eventClick: function(event, jsEvent, view) {
                    console.log(event);

                    selectedEvent = event;

                    $('#selectedDate').html(event.start.format('LL'));
                    $('#selectedBranch').html(event.branch);
                    $('#selectedBranchAddress').html(event.address);
                }
                // events: events
            });

            $('#branch_id').on('change', function() {
                let branchId = $(this).val();

                $('.calendar').fullCalendar('removeEvents');
                axios.get(`/api/v1/branches/${branchId}/slots`).then((res) => {
                    $('.calendar').fullCalendar('renderEvents', res.data, true);
                });
            });
        });
    </script>
@endsection
