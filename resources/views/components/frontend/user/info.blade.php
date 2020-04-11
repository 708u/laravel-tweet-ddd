<section class="user_info">
    {{-- TODO: Hardcoded. MUST fix --}}
    <h1>foo</h1>
    <span><a href="{{ route('frontend.user.show', ['uuid' => 12345]) }}">view my profile</a></span>
    <span>2 {{ Str::plural('tweet', 2) }}.</span>
</section>
