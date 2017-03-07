@extends('layouts.register')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p style="margin: 30px 10px 80px 10px; font-size: 16px">
                    Register a certification for your stay here in the Philippines online from the Bureau of Immigration.
                    This online service was created to make the registration and filling of your extension more convenient.
                    Please fill up the required fields below. Thank you for patronizing this service!
                </p>

                <form class="row" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="gender" class="control-label">Gender</label>

                            <select name="gender" id="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <label for="birthday" class="control-label">Birthday</label>

                            <input id="birthday" type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" required>
                            @if ($errors->has('birthday'))
                                <span class="help-block">
                                <strong>{{ $errors->first('birthday') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                            <label for="height" class="control-label">Height</label>

                            <input id="height" type="text" class="form-control" name="height" value="{{ old('height') }}" required>
                            @if ($errors->has('height'))
                                <span class="help-block">
                                <strong>{{ $errors->first('height') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('civil_status') ? ' has-error' : '' }}">
                            <label for="civil_status" class="control-label">Civil Status</label>

                            <select name="civil_status" id="civil_status" class="form-control">
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="widowed">Widowed</option>
                            </select>
                            @if ($errors->has('civil_status'))
                                <span class="help-block">
                                <strong>{{ $errors->first('civil_status') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('blood_type') ? ' has-error' : '' }}">
                            <label for="blood_type" class="control-label">Blood Type</label>

                            <input id="blood_type" type="text" class="form-control" name="blood_type" value="{{ old('blood_type') }}" required>
                            @if ($errors->has('blood_type'))
                                <span class="help-block">
                                <strong>{{ $errors->first('blood_type') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('certificate') ? ' has-error' : '' }}">
                            <label for="certificate" class="control-label">Certificate of Residency (For New Registrations)</label>

                            <input id="certificate" type="text" class="form-control" name="certificate" value="{{ old('certificate') }}" required>
                            @if ($errors->has('certificate'))
                                <span class="help-block">
                                <strong>{{ $errors->first('certificate') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="control-label">Address</label>

                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                            @if ($errors->has('address'))
                                <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('visa_type') ? ' has-error' : '' }}">
                            <label for="visa_type" class="control-label">Visa Type</label>

                            <input id="visa_type" type="text" class="form-control" name="visa_type" value="{{ old('visa_type') }}" required>
                            @if ($errors->has('visa_type'))
                                <span class="help-block">
                                <strong>{{ $errors->first('visa_type') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('visa_status') ? ' has-error' : '' }}">
                            <label for="visa_status" class="control-label">Visa Status</label>

                            <input id="visa_status" type="text" class="form-control" name="visa_status" value="{{ old('visa_status') }}" required>
                            @if ($errors->has('visa_status'))
                                <span class="help-block">
                                <strong>{{ $errors->first('visa_status') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('visa_issue_date') ? ' has-error' : '' }}">
                            <label for="visa_issue_date" class="control-label">Visa Issue Date</label>

                            <input id="visa_issue_date" type="text" class="form-control" name="visa_issue_date" value="{{ old('visa_issue_date') }}" required>
                            @if ($errors->has('visa_issue_date'))
                                <span class="help-block">
                                <strong>{{ $errors->first('visa_issue_date') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('visa_expiration') ? ' has-error' : '' }}">
                            <label for="visa_expiration" class="control-label">Visa Expiration</label>

                            <input id="visa_expiration" type="text" class="form-control" name="visa_expiration" value="{{ old('visa_expiration') }}" required>
                            @if ($errors->has('visa_expiration'))
                                <span class="help-block">
                                <strong>{{ $errors->first('visa_expiration') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 col-md-offset-9">
                            <button type="submit" class="btn btn-primary btn-block pull-right">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
