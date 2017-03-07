@extends('layouts.register')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 col-md-offset-3">
                        <button type="button" class="btn btn-primary btn-block">APPLY FOR EXTENSION</button>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary btn-block">VISA HISTORY</button>
                    </div>
                </div>
                <p style="margin: 30px 10px 80px 10px; font-size: 16px">
                    Register a certification for your stay here in the Philippines online from the Bureau of Immigration.
                    This online service was created to make the registration and filling of your extension more convenient.
                    Please fill up the required fields below. Thank you for patronizing this service!
                </p>

                <form class="row" role="form" method="POST" action="/update">
                    {{ csrf_field() }}

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('profile.first_name') ? ' has-error' : '' }}">
                            <label for="profile[first_name]" class="control-label">First Name</label>
                            <input id="profile[first_name]" type="text" class="form-control" name="profile[first_name]" value="{{ $user->profile->first_name }}" required>
                            @if ($errors->has('profile.first_name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('profile.first_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('profile.middle_name') ? ' has-error' : '' }}">
                            <label for="profile[middle_name]" class="control-label">Middle Name</label>
                            <input id="profile[middle_name]" type="text" class="form-control" name="profile[middle_name]" value="{{ $user->profile->middle_name }}" >
                            @if ($errors->has('profile.middle_name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('profile.middle_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('profile.last_name') ? ' has-error' : '' }}">
                            <label for="profile[last_name]" class="control-label">Last Name</label>
                            <input id="profile[last_name]" type="text" class="form-control" name="profile[last_name]" value="{{ $user->profile->last_name }}" required>
                            @if ($errors->has('profile.last_name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('profile.last_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('profile.gender') ? ' has-error' : '' }}">
                            <label for="profile[gender]" class="control-label">Gender</label>

                            <select name="profile[gender]" id="profile[gender]" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @if ($errors->has('profile.gender'))
                                <span class="help-block">
                                <strong>{{ $errors->first('profile.gender') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('profile.birthday') ? ' has-error' : '' }}">
                            <label for="profile[birthday]" class="control-label">Birthday</label>

                            <input id="profile[birthday]" type="date" class="form-control" name="profile[birthday]" value="{{ $user->profile->birthday }}" required>
                            @if ($errors->has('profile.birthday'))
                                <span class="help-block">
                                <strong>{{ $errors->first('profile.birthday') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('profile.height') ? ' has-error' : '' }}">
                            <label for="profile[height]" class="control-label">Height</label>

                            <input id="profile[height]" type="text" class="form-control" name="profile[height]" value="{{ $user->profile->height }}" >
                            @if ($errors->has('profile.height'))
                                <span class="help-block">
                                <strong>{{ $errors->first('profile.height') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('profile.weight') ? ' has-error' : '' }}">
                            <label for="profile[weight]" class="control-label">Weight</label>

                            <input id="profile[weight]" type="text" class="form-control" name="profile[weight]" value="{{ $user->profile->weight }}" >
                            @if ($errors->has('profile.weight'))
                                <span class="help-block">
                                <strong>{{ $errors->first('profile.weight') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('profile.civil_status') ? ' has-error' : '' }}">
                            <label for="profile[civil_status]" class="control-label">Civil Status</label>

                            <select name="profile[civil_status]" id="profile[civil_status]" class="form-control">
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="widowed">Widowed</option>
                            </select>
                            @if ($errors->has('profile.civil_status'))
                                <span class="help-block">
                                <strong>{{ $errors->first('profile.civil_status') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('profile.blood_type') ? ' has-error' : '' }}">
                            <label for="profile[blood_type]" class="control-label">Blood Type</label>

                            <input id="profile[blood_type]" type="text" class="form-control" name="profile[blood_type]" value="{{ $user->profile->blood_type }}" >
                            @if ($errors->has('profile.blood_type'))
                                <span class="help-block">
                                <strong>{{ $errors->first('profile.blood_type') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('profile.certificate') ? ' has-error' : '' }}">
                            <label for="profile[certificate]" class="control-label">Certificate of Residency (For New Registrations)</label>

                            <input id="profile[certificate]" type="text" class="form-control" name="profile[certificate]" value="{{ $user->profile->certificate }}" >
                            @if ($errors->has('profile.certificate'))
                                <span class="help-block">
                                <strong>{{ $errors->first('profile.certificate') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('profile.address') ? ' has-error' : '' }}">
                            <label for="profile[address]" class="control-label">Address</label>

                            <input id="profile[address]" type="text" class="form-control" name="profile[address]" value="{{ $user->profile->address }}" required>
                            @if ($errors->has('profile.address'))
                                <span class="help-block">
                                <strong>{{ $errors->first('profile.address') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('profile.visa_type') ? ' has-error' : '' }}">
                            <label for="profile[visa_type]" class="control-label">Visa Type</label>


                            <input id="profile[visa_type]" type="text" class="form-control" name="profile[visa_type]" value="{{ $user->profile->visa_type }}" >
                            @if ($errors->has('profile.visa_type'))
                                <span class="help-block">
                                <strong>{{ $errors->first('profile.visa_type') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('profile.visa_status') ? ' has-error' : '' }}">
                            <label for="profile[visa_status]" class="control-label">Visa Status</label>

                            <select name="profile[visa_status]" id="profile[visa_status]" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            @if ($errors->has('profile.visa_status'))
                                <span class="help-block">
                                <strong>{{ $errors->first('profile.visa_status') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('profile.visa_issue_date') ? ' has-error' : '' }}">
                            <label for="profile[visa_issue_date]" class="control-label">Visa Issue Date</label>

                            <input id="profile[visa_issue_date]" type="text" class="form-control" name="profile[visa_issue_date]" value="{{ $user->profile->visa_issue_date }}" >
                            @if ($errors->has('profile.visa_issue_date'))
                                <span class="help-block">
                                <strong>{{ $errors->first('profile.visa_issue_date') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" style="margin: 20px 0;">
                        <div class="form-group{{ $errors->has('profile.visa_expiration') ? ' has-error' : '' }}">
                            <label for="profile[visa_expiration]" class="control-label">Visa Expiration</label>

                            <input id="profile[visa_expiration]" type="text" class="form-control" name="profile[visa_expiration]" value="{{ $user->profile->visa_expiration }}" >
                            @if ($errors->has('profile.visa_expiration'))
                                <span class="help-block">
                                <strong>{{ $errors->first('profile.visa_expiration') }}</strong>
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
