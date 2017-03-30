@extends('layouts.app')

@section('content')
    <div class="content" id="headerImg">
        <div class="img-overlay"></div>
    </div>

    <div class="content" style="margin: 100px 0; min-height: 50vh">
        <div class="container" style="min-height: 80vh">
            <div class="row">
                <div class="col-md-12">
                    <h1>Mode of payment</h1>
                    <h3 class="text-primary">Choose how you pay</h3>
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

                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-9">
                                <button type="submit" class="btn btn-primary btn-block">
                                    CHECKOUT
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
