@extends('layouts.app')

@section('title')
    Login
@endsection

@include('layouts.partials.navbar')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="logInContain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5">
                    <div class="logInHead">
                        <h1>Log In</h1>
                        <h5>Access your account now</h5>
                        <div class="loginData">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                        <div class="float-left">
                                            <div class="clear"></div>
                                            <button type="submit" class="btn btn-hireMeNepal">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                        <div class="float-right">
                                            <div class="forgotPass">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}">Forgot Pasword ?</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="alreadyAc">
                                            <p> Already have an Account ? <a href="{{route('register')}} ">Register Now</a></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="#">
                                            <p class="logWith ">
                                                Log In With <img src="{{asset('images/facebook.png')}}" width="30" class="ml-1">
                                            </p>
                                        </a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="#">
                                            <p class="logWith">
                                                <a href="#">Log In With <img src="{{asset('images/google.png')}}" width="40" >
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="logImg">
                        <img src="{{asset('images/loging.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
