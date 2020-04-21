@extends('layouts.app')

@section('content')
<div class="uk-flex uk-flex-center uk-margin-large-top uk-margin-large-bottom" uk-grid>
    <div class="uk-card uk-card-default uk-width-xlarge@s">
        <div class="uk-card-header">
            <h3 class="uk-card-title uk-text-lead">{{ __('Login') }}</h3>
        </div>

        <div class="uk-card-body">
            <form method="POST" action="{{ route('frontend.auth.login') }}" class="uk-form-horizontal">
                @csrf
                <div class="uk-margin">
                    <label for="email" class="uk-form-label">{{ __('E-Mail Address') }}</label>
                    <div class="uk-form-controls">
                        <input id="email" type="email" class="uk-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="password" class="uk-form-label">{{ __('Password') }}</label>

                    <div class="uk-form-controls">
                        <input id="password" type="password" class="uk-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-form-controls">
                        <input class="uk-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-form-controls">
                        <button type="submit" class="uk-form-width-medium uk-button uk-button-primary uk-width-1-1">
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
        <div class="uk-card-footer uk-padding">
            <p>
                New User ? <a href="{{ route('frontend.auth.signup') }}">Sign up now!</a>
            </p>
        </div>
    </div>
</div>
@endsection
