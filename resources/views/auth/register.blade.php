
    <div class="row">
        <div class="col-md-12" style="z-index: 100; padding: 50px 80px;">
            <h2>Register</h2>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    @include('components.errors')

                    <div class="col-md-12">
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
                    <div class="col-md-12">
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
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
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
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="control-label">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
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
