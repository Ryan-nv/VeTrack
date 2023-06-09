@extends('layouts.auth')

@section('content')
    <div class="position-absolute vh-100 vw-100 d-flex justify-content-center align-items-center">
        <div class="d-flex flex-column justify-content-center container" style="max-width: 600px">
            <h3 class="text-center mx-auto mb-4">Login</h3>
            <div class="rounded rounded-3 shadow-lg p-4 w-100">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3 mx-3">
                        <label for="email" class="w-100 form-label">{{ __('Email Address') }}</label>

                        <div class="w-100">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mx-3 mb-1   ">
                        <label for="password" class="w-100 form-label">{{ __('Password') }}</label>

                        <div class="w-100">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="w-100 mb- mx-3">
                        <div class="">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex mb-0">
                        <button type="submit" class="btn btn-primary ms-auto me-3 mb-3">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </div>

            @if (Route::has('password.request'))
                <a class="btn btn-link mt-4" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </div>
@endsection
