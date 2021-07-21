@extends('website.layouts.layout')
@section('title')
    New Password
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Account Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{ url('website/assets/img/login-banner.png') }}" class="img-fluid"
                                    alt="Login Banner">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>Forgot Password?</h3>
                                    <p class="small text-muted">Enter your email to get a password reset link</p>
                                </div>
                                @include('website.includes.sessionDisplay')
                                <!-- Forgot Password Form -->
                                <form method="POST" action="{{ route('doctor.password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <div class="form-group form-focus">
                                        <input type="email" class="form-control floating" name="email"
                                            value="{{ old('email', $request->email) }}">
                                        <label class="focus-label">Email</label>
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group form-focus">
                                        <input type="password" class="form-control floating" name="password">
                                        <label class="focus-label">Password</label>
                                    </div>
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group form-focus">
                                        <input type="password" class="form-control floating" name="password_confirmation">
                                        <label class="focus-label">Confirm Password</label>
                                    </div>
                                    @error('password_confirmation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="text-right">
                                        <a class="forgot-link" href="{{ route('doctor.login') }}">Remember your
                                            password?</a>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Reset
                                        Password</button>
                                </form>
                                <!-- /Forgot Password Form -->

                            </div>
                        </div>
                    </div>
                    <!-- /Account Content -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection
