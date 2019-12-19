@extends('auth.app')

@section('content')
    <div class="login-container">

        <div class="login-header login-caret">

            <div class="login-content">

                <a href="{{route('admin.login')}}" class="logo">
                    <img src="{{ asset('backend/assets/images/logo@2x.png') }}" width="120" alt="" />
                </a>

                <p class="description">Enter your email, and we will send the reset link.</p>

            </div>

        </div>

        <div class="login-progressbar">
            <div></div>
        </div>

        <div class="login-form">

            <div class="login-content">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" role="form" action="{{ route('admin.password.email') }}">
                    @csrf

                    <div class="form-forgotpassword-success">
                        <i class="entypo-check"></i>
                        <h3>Reset email has been sent.</h3>
                        <p>Please check your email, reset password link will expire in 24 hours.</p>
                    </div>

                    <div class="form-steps">

                        <div class="step current" id="step-1">

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="entypo-mail"></i>
                                    </div>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block btn-login">
                                    {{ __('Send Password Reset Link') }}
                                    <i class="entypo-right-open-mini"></i>
                                </button>
                            </div>

                        </div>

                    </div>

                </form>


                <div class="login-bottom-links">

                    <a href="{{ route('admin.login') }}" class="link">
                        <i class="entypo-lock"></i>
                        {{ __('Return to Login Page') }}
                    </a>

                    <br />

                </div>

            </div>

        </div>

    </div>

@endsection
