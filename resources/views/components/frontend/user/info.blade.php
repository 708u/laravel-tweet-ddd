<section class="user_info">
    {{-- TODO: Hardcoded. MUST fix --}}
    <h1>{{ $user->userName }}</h1>
    <span><a href="{{ route('frontend.user.show', ['uuid' => $user->identifier]) }}">view my profile</a></span>
    <span>{{ $feeds->count() }} {{ Str::plural('tweet', $feeds->count()) }}.</span>
</section>
