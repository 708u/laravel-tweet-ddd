@guest
    <li class="uk-active"><a href="{{ route('frontend.static.home') }}"><span class="uk-margin-small-right" uk-icon="home"></span>Home</a></li>
    <li class="uk-active"><a href="{{ route('frontend.static.help') }}"><span class="uk-margin-small-right" uk-icon="question"></span>Help</a></li>
    <li class="uk-nav-divider"></li>
    <li class="uk-active"><a href="{{ route('frontend.auth.login') }}"><span class="uk-margin-small-right" uk-icon="user"></span>{{ __('Login') }}</a></li>
@else
    <li class="uk-active"><a href="{{ route('frontend.user.index')}}"><span class="uk-margin-small-right" uk-icon="users"></span>Users</a></li>
    <li class="uk-active">
        <a href="{{ route('frontend.user.edit', ['uuid' => Auth::user()->uuid]) }}">
            <span class="uk-margin-small-right" uk-icon="happy"></span>Profile
        </a>
    </li>
    <li class="uk-active"><a href="#"><span class="uk-margin-small-right" uk-icon="cog"></span>Settings</a></li>
    <li class="uk-nav-divider"></li>
    <li class="uk-active">
        <a href="{{ route('frontend.auth.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <span class="uk-margin-small-right" uk-icon="sign-out"></span>{{ __('Logout') }}
        </a>
    </li>

    <form id="logout-form" action="{{ route('frontend.auth.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endguest
