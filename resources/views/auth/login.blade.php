
    <div class="row" id="loginForm">
        <div class="col-md-12" style="z-index: 100; color: #fff; padding: 50px 80px;">
            <h1 style="color: #fff;">Bureau of Immigration Online Service</h1>
            <h3 style="color: #fff;">Registration / Renewal</h3>
            <p>
                Register a certification for your stay here in the Philippines online from the Bureau of Immigration.
                This online service was created to make the registration and filling of your extension more convenient.
                Please fill up the required fields below. Thank you for patronizing this service!
            </p>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

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
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                {{--Forgot Your Password?--}}
                            {{--</a>--}}
                            <button type="submit" class="btn btn-default">
                                SIGN IN
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
