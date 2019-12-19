@extends('auth.app')

@section('content')
<div class="login-container">

    <div class="login-header login-caret">

        <div class="login-content">

            <a href="index.html" class="logo">
                <img src="{{ asset('backend/assets/images/logo@2x.png') }}" width="120" alt="" />
            </a>

            <p class="description">Dear user, log in to access the admin area!</p>

        </div>

    </div>

    <div class="login-progressbar">
        <div></div>
    </div>

    <div class="login-form">

        <div class="login-content">

            <div class="form-login-error">
                <h3>Invalid login</h3>
                <p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
            </div>

            <form method="POST" action="{{ route('admin.login') }}" role="form">
                @csrf

                <div class="form-group">

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>

                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                    </div>

                </div>

                <div class="form-group">

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">
                    </div>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-login">
                        <i class="entypo-login"></i>
                        Login In
                    </button>
                </div>

            </form>


            <div class="login-bottom-links">
                @if (Route::has('admin.password.request'))
                    <a href="{{ route('admin.password.request') }}" class="link">{{ __('Forgot Your Password?') }}</a>
                @endif
            </div>

        </div>

    </div>

</div>

@endsection
