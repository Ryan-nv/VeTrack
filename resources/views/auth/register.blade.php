@extends('layouts.auth')

@section('content')
    <div class="position-fixed vh-100 vw-100 d-flex justify-content-center align-items-center">
        <div class="d-flex flex-column justify-content-center" style="min-width: 500px;">
            <h3 class="text-center mx-auto mb-4">Register</h3>
            <div class="rounded rounded-3 shadow-lg p-4 w-100">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3 mx-3">
                        <label for="name" class="w-100 form-label">{{ __('Name') }}</label>

                        <div class="w-100">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 mx-3">
                        <label for="email" class="w-100 form-label">{{ __('Email Address') }}</label>

                        <div class="w-100">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 mx-3">
                        <label for="password" class="w-100 form-label">{{ __('Password') }}</label>

                        <div class="w-100">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 mx-3">
                        <label for="password-confirm"
                            class="w-100 form-label">{{ __('Confirm Password') }}</label>

                        <div class="w-100">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="ms-auto mb-3 me-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <small class="text-center mt-4">this account will be registered as supervisor</small>
        </div>
    </div>
@endsection
