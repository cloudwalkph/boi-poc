@extends('layouts.app')

@section('content')

    <form role="form" method="POST" action="/update">
        <div class="content" id="headerImg">
            <div class="img-overlay"></div>
            <div class="registration-text">
                <h2 style="color: #fff;">{{ Auth::user()->profile->getFullNameAttribute() }}</h2>
                <h4 style="color: #fff;">Online Application Form</h4>
            </div>
            <img src="/assets/images/{{ isset(Auth::user()->profile->profile_picture) ? Auth::user()->profile->profile_picture : 'id.png' }}"
                 class="registration-img" alt="ID">

            <div class="button-container">
                <a href="/extension" class="btn btn-primary">APPLY FOR EXTENSION</a>
                <a href="/visa-history" class="btn btn-primary">VISA HISTORY</a>
            </div>

        </div>

        <div class="content" style="margin: 150px 0">
            <div class="container">
                <div class="col-md-12">
                    @include('components.errors')
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-12">
                            <p style="font-size: 20px"><strong>PERSONAL INFORMATION</strong></p>
                        </div>
                        <div class="col-md-6" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('profile.last_name') ? ' has-error' : '' }}">
                                <label for="profile[last_name]" class="control-label">Last Name</label>
                                <input id="profile[last_name]" type="text" class="form-control" name="profile[last_name]"
                                       value="{{ isset($user->profile->last_name) ? $user->profile->last_name : '' }}" >
                                @if ($errors->has('profile.last_name'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('profile.last_name') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('profile.first_name') ? ' has-error' : '' }}">
                                <label for="profile[first_name]" class="control-label">First/Given Name</label>
                                <input id="profile[first_name]" type="text" class="form-control" name="profile[first_name]"
                                       value="{{ isset($user->profile->first_name) ? $user->profile->first_name : '' }}" >
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
                                <input id="profile[middle_name]" type="text" class="form-control" name="profile[middle_name]"
                                       value="{{ isset($user->profile->middle_name) ? $user->profile->middle_name : '' }}" >
                                @if ($errors->has('profile.middle_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile.middle_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('alias.alias') ? ' has-error' : '' }}">
                                <label for="alias[alias]" class="control-label">Other Name(s)/Alias(es)</label>
                                <input id="alias[alias]" type="text" class="form-control" name="alias[alias]"
                                       value="{{ isset($user->alias->alias) ? $user->alias->alias : '' }}" >
                                @if ($errors->has('alias.alias'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alias.alias') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6" style="margin: 20px 0;">
                            {{--<button class="btn btn-primary"> Add Another Alias</button>--}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('profile.birthday') ? ' has-error' : '' }}">
                                <label for="profile[birthday]" class="control-label">Date of Birth</label>

                                <input id="profile[birthday]" type="date" class="form-control" name="profile[birthday]"
                                       value="{{ isset($user->profile->birthday) ? $user->profile->birthday : '' }}" >
                                @if ($errors->has('profile.birthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile.birthday') }}</strong>
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
                            <div class="form-group{{ $errors->has('profile.birth_country') ? ' has-error' : '' }}">
                                <label for="profile[birth_country]" class="control-label">Country of Birth</label>
                                <input id="profile[birth_country]" type="text" class="form-control" name="profile[birth_country]"
                                       value="{{ isset($user->profile->birth_country) ? $user->profile->birth_country : '' }}" >
                                @if ($errors->has('profile.birth_country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile.birth_country') }}</strong>
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
                            <div class="form-group{{ $errors->has('profile.height') ? ' has-error' : '' }}">
                                <label for="profile[height]" class="control-label">Height</label>

                                <input id="profile[height]" type="text" class="form-control" name="profile[height]"
                                       value="{{ isset($user->profile->height) ? $user->profile->height : '' }}" >
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

                                <input id="profile[weight]" type="text" class="form-control" name="profile[weight]"
                                       value="{{ isset($user->profile->weight) ? $user->profile->weight : '' }}" >
                                @if ($errors->has('profile.weight'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile.weight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <p style="font-size: 20px"><strong>RESIDENTIAL ADDRESS ABROAD</strong></p>
                        </div>

                        <div class="col-md-12" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('address.street') ? ' has-error' : '' }}">
                                <label for="address[street]" class="control-label">House/Unit No., Street, Subdivision/Village</label>

                                <input id="address[street]" type="text" class="form-control" name="address[street]"
                                       value="{{ isset($user->address->street) ? $user->address->street : '' }}" >
                                @if ($errors->has('address.street'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address.street') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('address.city') ? ' has-error' : '' }}">
                                <label for="address[city]" class="control-label">City, State</label>

                                <input id="address[city]" type="text" class="form-control" name="address[city]"
                                       value="{{ isset($user->address->city) ? $user->address->city : '' }}" >
                                @if ($errors->has('address.city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address.city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('address.country') ? ' has-error' : '' }}">
                                <label for="address[country]" class="control-label">Country</label>

                                <input id="address[country]" type="text" class="form-control" name="address[country]"
                                       value="{{ isset($user->address->country) ? $user->address->country : '' }}" >
                                @if ($errors->has('address.country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address.country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('address.zip_code') ? ' has-error' : '' }}">
                                <label for="address[zip_code]" class="control-label">Zip Code</label>

                                <input id="address[zip_code]" type="text" class="form-control" name="address[zip_code]"
                                       value="{{ isset($user->address->zip_code) ? $user->address->zip_code : '' }}" >
                                @if ($errors->has('address.zip_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address.zip_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <p style="font-size: 20px"><strong>TRAVEL INFORMATION</strong></p>
                        </div>

                        <div class="col-md-6" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('travelInformation.passport_number') ? ' has-error' : '' }}">
                                <label for="travelInformation[passport_number]" class="control-label">Passport Number</label>

                                <input id="travelInformation[passport_number]" type="text" class="form-control" name="travelInformation[passport_number]"
                                       value="{{ isset($user->travelInformation->passport_number) ? $user->travelInformation->passport_number : '' }}" >
                                @if ($errors->has('travelInformation.passport_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('travelInformation.passport_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('travelInformation.expiration_date') ? ' has-error' : '' }}">
                                <label for="travelInformation[expiration_date]" class="control-label">Expiry Date/Valid Until</label>

                                <input id="travelInformation[expiration_date]" type="date" class="form-control" name="travelInformation[expiration_date]"
                                       value="{{ isset($user->travelInformation->expiration_date) ? $user->travelInformation->expiration_date : '' }}" >
                                @if ($errors->has('travelInformation.expiration_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('travelInformation.expiration_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('travelInformation.place_of_issuance') ? ' has-error' : '' }}">
                                <label for="travelInformation[place_of_issuance]" class="control-label">Place of Issuance</label>

                                <input id="travelInformation[place_of_issuance]" type="text" class="form-control"
                                       name="travelInformation[place_of_issuance]"
                                       value="{{ isset($user->travelInformation->place_of_issuance) ? $user->travelInformation->place_of_issuance : '' }}" >
                                @if ($errors->has('travelInformation.place_of_issuance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('travelInformation.place_of_issuance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('travelInformation.latest_arrival') ? ' has-error' : '' }}">
                                <label for="travelInformation[latest_arrival]" class="control-label">Date of Latest Arrival</label>

                                <input id="travelInformation[latest_arrival]" type="text" class="form-control"
                                       name="travelInformation[latest_arrival]"
                                       value="{{ isset($user->travelInformation->latest_arrival) ? $user->travelInformation->latest_arrival : '' }}" >
                                @if ($errors->has('travelInformation.latest_arrival'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('travelInformation.latest_arrival') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('travelInformation.flight_number') ? ' has-error' : '' }}">
                                <label for="travelInformation[flight_number]" class="control-label">Flight Number</label>

                                <input id="travelInformation[flight_number]" type="text" class="form-control"
                                       name="travelInformation[flight_number]"
                                       value="{{ isset($user->travelInformation->flight_number) ? $user->travelInformation->flight_number : '' }}" >
                                @if ($errors->has('travelInformation.flight_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('travelInformation.flight_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div id="characterReference">
                        <div class="row">
                            <div class="col-md-12">
                                <p style="font-size: 22px">
                                    <strong>CHARACTER REFERENCES IN THE PHILIPPINES</strong>
                                    {{--<button class="btn btn-primary pull-right"><i class="fa fa-plus fa-lg"></i> Add another reference</button>--}}
                                </p>
                            </div>

                            <div class="col-md-6" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('characterReference.last_name') ? ' has-error' : '' }}">
                                    <label for="characterReference[last_name]" class="control-label">Last Name</label>
                                    <input id="characterReference[last_name]" type="text" class="form-control"
                                           name="characterReference[last_name]"
                                           value="{{ isset($user->characterReference->last_name) ? $user->characterReference->last_name : '' }}" >
                                    @if ($errors->has('characterReference.last_name'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('characterReference.last_name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('characterReference.first_name') ? ' has-error' : '' }}">
                                    <label for="characterReference[first_name]" class="control-label">First/Given Name</label>
                                    <input id="characterReference[first_name]" type="text" class="form-control"
                                           name="characterReference[first_name]"
                                           value="{{ isset($user->characterReference->first_name) ? $user->characterReference->first_name : '' }}" >
                                    @if ($errors->has('characterReference.first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('characterReference.first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('characterReference.middle_name') ? ' has-error' : '' }}">
                                    <label for="characterReference[middle_name]" class="control-label">Middle Name</label>
                                    <input id="characterReference[middle_name]" type="text" class="form-control"
                                           name="characterReference[middle_name]"
                                           value="{{ isset($user->characterReference->middle_name) ? $user->characterReference->middle_name : '' }}" >
                                    @if ($errors->has('characterReference.middle_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('characterReference.middle_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('characterReference.landline_number') ? ' has-error' : '' }}">
                                    <label for="characterReference[landline_number]" class="control-label">Landline</label>
                                    <input id="characterReference[landline_number]" type="text" class="form-control"
                                           name="characterReference[landline_number]"
                                           value="{{ isset($user->characterReference->landline_number) ? $user->characterReference->landline_number : '' }}" >
                                    @if ($errors->has('characterReference.landline_number'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('characterReference.landline_number') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('characterReference.mobile_number') ? ' has-error' : '' }}">
                                    <label for="characterReference[mobile_number]" class="control-label">Mobile</label>
                                    <input id="characterReference[mobile_number]" type="text" class="form-control"
                                           name="characterReference[mobile_number]"
                                           value="{{ isset($user->characterReference->mobile_number) ? $user->characterReference->mobile_number : '' }}" >
                                    @if ($errors->has('characterReference.mobile_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('characterReference.mobile_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('characterReference.street') ? ' has-error' : '' }}">
                                    <label for="characterReference[street]" class="control-label">House/Unit No., Street, Subdivision/Village</label>

                                    <input id="characterReference[street]" type="text" class="form-control" name="characterReference[street]"
                                           value="{{ isset($user->characterReference->street) ? $user->characterReference->street : '' }}" >
                                    @if ($errors->has('characterReference.street'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('characterReference.street') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('characterReference.city') ? ' has-error' : '' }}">
                                    <label for="characterReference[city]" class="control-label">City, State</label>

                                    <input id="characterReference[city]" type="text" class="form-control" name="characterReference[city]"
                                           value="{{ isset($user->characterReference->city) ? $user->characterReference->city : '' }}" >
                                    @if ($errors->has('characterReference.city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('characterReference.city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('characterReference.country') ? ' has-error' : '' }}">
                                    <label for="characterReference[country]" class="control-label">Country</label>

                                    <input id="characterReference[country]" type="text" class="form-control" name="characterReference[country]"
                                           value="{{ isset($user->characterReference->country) ? $user->characterReference->country : '' }}" >
                                    @if ($errors->has('characterReference.country'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('characterReference.country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('characterReference.zip_code') ? ' has-error' : '' }}">
                                    <label for="characterReference[zip_code]" class="control-label">Zip Code</label>

                                    <input id="characterReference[zip_code]" type="text" class="form-control" name="characterReference[zip_code]"
                                           value="{{ isset($user->characterReference->zip_code) ? $user->characterReference->zip_code : '' }}" >
                                    @if ($errors->has('characterReference.zip_code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('characterReference.zip_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-3 col-md-offset-9">
                            <button type="submit" class="btn btn-primary btn-block pull-right">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
