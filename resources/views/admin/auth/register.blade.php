@extends('adminetic::admin.auth.layouts.app')
@section('content')
<div class="row m-0">
    <div class="col-xl-7 p-0">
        <img class="bg-img-cover bg-center fadeIn animated" src="{{ login_register_bg_image() }}" alt="registerpage">
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
                    <form class="theme-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <h4>Create your account</h4>
                        <p>Enter your personal details to create account</p>
                        <div class="form-group">
                            <label class="col-form-label pt-0">Your Name</label>
                            <div class="row g-2">
                                <div class="col-12">
                                    <input class="form-control @error('name')shake animated @enderror" type="text"
                                        name="name" placeholder="Your Name" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
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
                        <div class="form-group">
                            <label class="col-form-label">Confirm Password</label>
                            <div class="form-input position-relative">
                                <input class="form-control @error('password_confirmation')shake animated @enderror"
                                    type="password" name="password_confirmation" placeholder="*********" required>
                            </div>
                            @error('password_confirmation')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <div class="checkbox p-0">
                                <input id="checkbox1" type="checkbox" required>
                                <label class="text-muted" for="checkbox1">Agree with<a class="ms-2" href="#">Privacy
                                        Policy</a></label>
                            </div>
                            <button class="btn btn-primary btn-block w-100" type="submit">Create Account</button>
                        </div>
                        @if (config('adminetic.enable_socialite', false))
                        @include('adminetic::admin.auth.layouts.socialite')
                        @endif
                        @if (Route::has('login'))
                        <p class="mt-4 mb-0 text-center">Already have an account?<a class="ms-2"
                                href="{{ route('login') }}">Sign
                                in</a></p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection