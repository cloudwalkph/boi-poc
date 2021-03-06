
    <div class="row">
        <div class="col-md-12" id="registerContent">
            <h2>Register</h2>
            <form class="" role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                @include('components.errors')

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('travel.passport_number') ? ' has-error' : '' }}">
                        <label for="travel[passport_number]" class="control-label">Passport Number</label>
                        <input id="travel[passport_number]" type="text" class="form-control" name="travel[passport_number]" value="{{ old('travel.passport_number') }}" required>
                        @if ($errors->has('travel.passport_number'))
                            <span class="help-block">
                            <strong>{{ $errors->first('travel.passport_number') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('profile.first_name') ? ' has-error' : '' }}">
                        <label for="profile[first_name]" class="control-label">First Name</label>
                        <input id="profile[first_name]" type="text" class="form-control" name="profile[first_name]" value="{{ old('profile.first_name') }}" required>
                        @if ($errors->has('profile.first_name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('profile.first_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('profile.last_name') ? ' has-error' : '' }}">
                        <label for="profile[last_name]" class="control-label">Last Name</label>
                        <input id="profile[last_name]" type="text" class="form-control" name="profile[last_name]" value="{{ old('profile.last_name') }}" required>
                        @if ($errors->has('profile.last_name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('profile.last_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('profile.birthday') ? ' has-error' : '' }}">
                        <label for="profile[birthday]" class="control-label">Birthday</label>
                        <input id="profile[birthday]" type="date" class="form-control" name="profile[birthday]" value="{{ old('profile.birthday') }}" required>
                        @if ($errors->has('profile.birthday'))
                            <span class="help-block">
                            <strong>{{ $errors->first('profile.birthday') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('registerEmail') ? ' has-error' : '' }}">
                        <label for="registerEmail" class="control-label">E-mail Address</label>
                        <input id="registerEmail" type="email" class="form-control" name="registerEmail" value="{{ old('registerEmail') }}" required>
                        @if ($errors->has('registerEmail'))
                            <span class="help-block">
                            <strong>{{ $errors->first('registerEmail') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('registerPassword') ? ' has-error' : '' }}">
                        <label for="registerPassword" class="control-label">Password</label>
                        <input id="registerPassword" type="password" class="form-control" name="registerPassword" required>
                        @if ($errors->has('registerPassword'))
                            <span class="help-block">
                            <strong>{{ $errors->first('registerPassword') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('registerPassword_confirmation') ? ' has-error' : '' }}">
                        <label for="registerPassword-confirm" class="control-label">Confirm Password</label>
                        <input id="registerPassword-confirm" type="password" class="form-control" name="registerPassword_confirmation" required>
                        @if ($errors->has('registerPassword_confirmation'))
                            <span class="help-block">
                            <strong>{{ $errors->first('registerPassword_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
