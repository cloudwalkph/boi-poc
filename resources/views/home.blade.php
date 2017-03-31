@extends('layouts.app')

@section('content')

    <div class="content" id="headerImg">
        <div class="img-overlay"></div>
        <div class="registration-text">
            <h2 style="color: #fff;">{{ Auth::user()->profile->getFullNameAttribute() }}</h2>
            <h4 style="color: #fff;">Online Application Form</h4>
        </div>
        <img src="/assets/images/{{ isset(Auth::user()->profile->profile_picture) ? Auth::user()->profile->profile_picture : 'id.png' }}"
             class="registration-img" alt="ID">

        <div class="button-container">
            <a href="#" class="btn btn-primary">APPLY FOR EXTENSION</a>
            <a href="/visa-history" class="btn btn-primary">VISA HISTORY</a>
        </div>

    </div>

    <div class="content" style="margin: 150px 0">
        <div class="container">
            <div class="col-md-12">
                <form role="form" method="POST" action="/update">
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
                            <div class="form-group{{ $errors->has('profile.alias') ? ' has-error' : '' }}">
                                <label for="profile[alias]" class="control-label">Other Name(s)/Alias(es)</label>
                                <input id="profile[alias]" type="text" class="form-control" name="profile[alias]"
                                       value="{{ isset($user->profile->alias) ? $user->profile->alias : '' }}" >
                                @if ($errors->has('profile.alias'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile.alias') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6" style="margin: 20px 0;">
                            <button class="btn btn-primary"> Add Another Alias</button>
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
                            <div class="form-group{{ $errors->has('travel_information.passport_number') ? ' has-error' : '' }}">
                                <label for="travel_information[passport_number]" class="control-label">Passport Number</label>

                                <input id="travel_information[passport_number]" type="text" class="form-control" name="travel_information[passport_number]"
                                       value="{{ isset($user->travel_information->passport_number) ? $user->travel_information->passport_number : '' }}" >
                                @if ($errors->has('travel_information.passport_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('travel_information.passport_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('travel_information.expiry') ? ' has-error' : '' }}">
                                <label for="travel_information[expiry]" class="control-label">Expiry Date/Valid Until</label>

                                <input id="travel_information[expiry]" type="date" class="form-control" name="travel_information[expiry]"
                                       value="{{ isset($user->travel_information->expiry) ? $user->travel_information->expiry : '' }}" >
                                @if ($errors->has('travel_information.expiry'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('travel_information.expiry') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('travel_information.place_of_issuance') ? ' has-error' : '' }}">
                                <label for="travel_information[place_of_issuance]" class="control-label">Place of Issuance</label>

                                <input id="travel_information[place_of_issuance]" type="text" class="form-control"
                                       name="travel_information[place_of_issuance]"
                                       value="{{ isset($user->travel_information->place_of_issuance) ? $user->travel_information->place_of_issuance : '' }}" >
                                @if ($errors->has('travel_information.place_of_issuance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('travel_information.place_of_issuance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('travel_information.latest_arrival') ? ' has-error' : '' }}">
                                <label for="travel_information[latest_arrival]" class="control-label">Date of Latest Arrival</label>

                                <input id="travel_information[latest_arrival]" type="text" class="form-control"
                                       name="travel_information[latest_arrival]"
                                       value="{{ isset($user->travel_information->latest_arrival) ? $user->travel_information->latest_arrival : '' }}" >
                                @if ($errors->has('travel_information.latest_arrival'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('travel_information.latest_arrival') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6" style="margin: 20px 0;">
                            <div class="form-group{{ $errors->has('travel_information.flight_number') ? ' has-error' : '' }}">
                                <label for="travel_information[flight_number]" class="control-label">Flight Number</label>

                                <input id="travel_information[flight_number]" type="text" class="form-control"
                                       name="travel_information[flight_number]"
                                       value="{{ isset($user->travel_information->flight_number) ? $user->travel_information->flight_number : '' }}" >
                                @if ($errors->has('travel_information.flight_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('travel_information.flight_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div id="character_references">
                        <div class="row">
                            <div class="col-md-12">
                                <p style="font-size: 22px">
                                    <strong>CHARACTER REFERENCES IN THE PHILIPPINES</strong>
                                    <button class="btn btn-primary pull-right"><i class="fa fa-plus fa-lg"></i> Add another reference</button>
                                </p>
                            </div>

                            <div class="col-md-6" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('character_references.last_name') ? ' has-error' : '' }}">
                                    <label for="character_references[last_name]" class="control-label">Last Name</label>
                                    <input id="character_references[last_name]" type="text" class="form-control"
                                           name="character_references[last_name]"
                                           value="{{ isset($user->character_references->last_name) ? $user->character_references->last_name : '' }}" >
                                    @if ($errors->has('character_references.last_name'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('character_references.last_name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('character_references.first_name') ? ' has-error' : '' }}">
                                    <label for="character_references[first_name]" class="control-label">First/Given Name</label>
                                    <input id="character_references[first_name]" type="text" class="form-control"
                                           name="character_references[first_name]"
                                           value="{{ isset($user->character_references->first_name) ? $user->character_references->first_name : '' }}" >
                                    @if ($errors->has('character_references.first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('character_references.first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('character_references.middle_name') ? ' has-error' : '' }}">
                                    <label for="character_references[middle_name]" class="control-label">Middle Name</label>
                                    <input id="character_references[middle_name]" type="text" class="form-control"
                                           name="character_references[middle_name]"
                                           value="{{ isset($user->character_references->middle_name) ? $user->character_references->middle_name : '' }}" >
                                    @if ($errors->has('character_references.middle_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('character_references.middle_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('character_references.landline_number') ? ' has-error' : '' }}">
                                    <label for="character_references[landline_number]" class="control-label">Landline</label>
                                    <input id="character_references[landline_number]" type="text" class="form-control"
                                           name="character_references[landline_number]"
                                           value="{{ isset($user->character_references->landline_number) ? $user->character_references->landline_number : '' }}" >
                                    @if ($errors->has('character_references.landline_number'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('character_references.landline_number') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('character_references.mobile_number') ? ' has-error' : '' }}">
                                    <label for="character_references[mobile_number]" class="control-label">Mobile</label>
                                    <input id="character_references[mobile_number]" type="text" class="form-control"
                                           name="character_references[mobile_number]"
                                           value="{{ isset($user->character_references->mobile_number) ? $user->character_references->mobile_number : '' }}" >
                                    @if ($errors->has('character_references.mobile_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('character_references.mobile_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('character_references.street') ? ' has-error' : '' }}">
                                    <label for="character_references[street]" class="control-label">House/Unit No., Street, Subdivision/Village</label>

                                    <input id="character_references[street]" type="text" class="form-control" name="character_references[street]"
                                           value="{{ isset($user->character_references->street) ? $user->character_references->street : '' }}" >
                                    @if ($errors->has('character_references.street'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('character_references.street') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('character_references.city') ? ' has-error' : '' }}">
                                    <label for="character_references[city]" class="control-label">City, State</label>

                                    <input id="character_references[city]" type="text" class="form-control" name="character_references[city]"
                                           value="{{ isset($user->character_references->city) ? $user->character_references->city : '' }}" >
                                    @if ($errors->has('character_references.city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('character_references.city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('character_references.country') ? ' has-error' : '' }}">
                                    <label for="character_references[country]" class="control-label">Country</label>

                                    <input id="character_references[country]" type="text" class="form-control" name="character_references[country]"
                                           value="{{ isset($user->character_references->country) ? $user->character_references->country : '' }}" >
                                    @if ($errors->has('character_references.country'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('character_references.country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6" style="margin: 20px 0;">
                                <div class="form-group{{ $errors->has('character_references.zip_code') ? ' has-error' : '' }}">
                                    <label for="character_references[zip_code]" class="control-label">Zip Code</label>

                                    <input id="character_references[zip_code]" type="text" class="form-control" name="character_references[zip_code]"
                                           value="{{ isset($user->character_references->zip_code) ? $user->character_references->zip_code : '' }}" >
                                    @if ($errors->has('character_references.zip_code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('character_references.zip_code') }}</strong>
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
                </form>
            </div>
        </div>
    </div>
@endsection
