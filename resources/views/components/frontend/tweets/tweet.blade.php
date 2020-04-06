<li id="tweet-{{ $tweet->identifier }}">
    <span class="user"><a href="{{ route('frontend.user.show', ['uuid' => $tweet->userId]) }}">{{ $tweet->username }}</a></span>
    <span class="content">{{ $tweet->tweetContent }}</span>
    <span class="timestamp">Posted {{ $tweet->timestamp }}.</span>
</li>
