@extends('adminetic::admin.auth.layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-7">
        <img class="bg-img-cover bg-center fadeIn animated" src="{{ login_register_bg_image() }}" alt="loginpage">
    </div>
    <div class="col-xl-5 p-0">
        <div class="login-card">
            <div>
                <div>
                    <a class="logo text-start" href="{{ route('dashboard') }}">
                        <img class="for-light" width="80" src="{{ logo() }}" alt="Light Logo">
                        <img class="for-dark" width="80" src="{{ dark_logo() ?? logo() }}" alt="Dark Logo">
                    </a>
                </div>
                <div class="login-main">
                    <form class="theme-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h4>Sign in to account</h4>
                        <p>Enter your email & password to login</p>
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
                            </div>
                            @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <div class="checkbox p-0">
                                <input type="checkbox" name="remember" id="remember">
                                <label class="text-muted" for="remember">Remember password</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                        </div>
                        @if (config('adminetic.enable_socialite', false))
                        @include('adminetic::admin.auth.layouts.socialite')
                        @endif
                        @if (Route::has('register'))
                        <p class="mt-4 mb-0 text-center">
                            Don't have account?<a class="ms-2" href="{{ route('register') }}">Create
                                Account</a>
                        </p>
                        <hr>
                        <span class="d-flex justify-content-center">
                            <a href="{{ route('password.request') }}" class="card-link">Forgot
                                Password?</a>
                        </span>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection