@extends('layouts.auth', ['title' => 'Login'])

@section('content')
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <h1 style="font-size: 30px;" class="auth-title">Sign Up</h1>
            <p style="font-size: 18px;" class="auth-subtitle mb-5">Input your data to register to our website.</p>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" name="username" class="form-control form-control" placeholder="Username" value="{{ old('username') }}">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>

                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" name="email" class="form-control form-control" placeholder="Email" value="{{ old('email') }}">
                    <div class=" form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control" placeholder="Password" name="password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" name="password_confirmation" class="form-control form-control" placeholder="Confirm Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn shadow mt-5">Sign Up</button>
            </form>
            <div class="text-center mt-5 textfs-4">
                <p class='text-gray-600'>Already have an account? <a href="{{ route('login') }}" class='font-bold'>Log
                        in</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>
@stop