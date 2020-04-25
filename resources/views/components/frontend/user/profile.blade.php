<div class="uk-margin-large-top uk-margin-large-bottom" uk-grid>
    <div class="uk-card uk-card-default uk-width-xlarge@s uk-margin-auto">
        <div class="uk-card-header">
            <h3 class="uk-card-title uk-text-lead">{{ $profileCardName }}</h3>
        </div>

        <div class="uk-card-body">
            <form method="POST" action="{{ $formAction }}" class="uk-form-horizontal">
                {{ $httpMethod }}
                @csrf
                <div class="uk-margin">
                    <label for="name" class="uk-form-label">{{ __('Name') }}</label>
                    <div class="uk-form-controls">
                        <input id="name" type="name" class="uk-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $userName }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="uk-margin">
                    <label for="email" class="uk-form-label">{{ __('E-Mail Address') }}</label>
                    <div class="uk-form-controls">
                        <input id="email" type="email" class="uk-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $email }}" required autocomplete="email">

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
                        <input id="password" type="password" class="uk-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="uk-margin">
                    <label for="password-confirm" class="uk-form-label">{{ __('Confirm Password') }}</label>
                    <div class="uk-form-controls">
                        <input id="password-connfirm" type="password" class="uk-input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="uk-form-controls">
                    <button type="submit" class="uk-form-width-medium uk-button uk-button-primary uk-width-1-1">
                        {{ $actionButton }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
