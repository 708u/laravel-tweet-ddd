<section class="user_info">
    <h1>{{ $user->userName }}</h1>
    <span><a href="{{ route('frontend.user.show', ['uuid' => $user->identifier]) }}">view my profile</a></span>
    <span>{{ $feeds->total() }} {{ Str::plural('tweet', $feeds->total()) }}.</span>
</section>
