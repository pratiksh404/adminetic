@extends('adminetic::admin.auth.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="login-card">
            <div>
                <div>
                    <a class="logo text-start" href="{{ route('dashboard') }}">
                        <img class="for-light" width="80" src="{{ logo() }}" alt="Light Logo">
                        <img class="for-dark" width="80" src="{{ dark_logo() ?? logo() }}" alt="Dark Logo">
                    </a>
                </div>
                <div class="login-main">
                    <form class="theme-form" method="POST" action="{{ route('password.update') }}">
                        <h4>Reset Your Password</h4>
                        <div class="form-group">
                            <label class="col-form-label">Email Address</label>
                            <input class="form-control @error('email')shake animated @enderror" type="email"
                                name="email" placeholder="Your Email" required>
                            @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <div class="form-input position-relative">
                                <input class="form-control @error('password')shake animated @enderror" type="password"
                                    name="password" placeholder="*********" required>
                                <div class="show-hide"><span class="show"> </span></div>
                            </div>
                            @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Confirm Password</label>
                            <div class="form-input position-relative">
                                <input class="form-control @error('password_confirmation')shake animated @enderror"
                                    type="password" name="password_confirmation" placeholder="*********" required>
                                <div class="show-hide"><span class="show"> </span></div>
                            </div>
                            @error('password_confirmation')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <button class="btn btn-primary btn-block w-100" type="submit">Reset Password</button>
                        </div>
                        @if (Route::has('register'))
                        <p class="mt-4 mb-0">Don't have account?<a class="ms-2" href="{{ route('register') }}">Create
                                Account</a>
                        </p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection