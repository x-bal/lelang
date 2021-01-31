@extends('layouts.auth', ['title' => 'Login'])

@section('content')
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <!-- <div class="auth-logo">
                        <a href=""><img src="{{ asset('images') }}/logo/logo.png" alt="Logo"></a>
                    </div> -->
            <h1 style="font-size: 30px;" class="auth-title">Log in.</h1>
            <p style="font-size: 20px;" class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control" placeholder="Username" name="username" value="{{ old('username') }}">
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

                <div class="form-check form-check d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label text-gray-600" for="remember">
                        Remember Me
                    </label>
                </div>
                <button class="btn btn-primary btn-block btn shadow-lg mt-5">Log in</button>
            </form>
            <div class="text-center mt-5 textfs-4">
                <p class='text-gray-600'>Don't have an account? <a href="{{ route('register') }}" class='font-bold'>Sign
                        up</a>.</p>
                @if (Route::has('password.request'))
                <p><a class='font-bold  ' href="{{ route('password.request') }}">Forgot password?</a></p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div id="auth-right">

        </div>
    </div>
</div>
@stop