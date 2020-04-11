<li id="tweet-{{ $tweet->identifier }}">
    <span class="user"><a href="{{ route('frontend.user.show', ['uuid' => $tweet->userId]) }}">{{ $tweet->username }}</a></span>
    <span class="content">{{ $tweet->tweetContent }}</span>
    <form method="POST" action="{{ route('frontend.tweet.destroy', ['tweetUuid' => $tweet->identifier]) }} }}">
        @csrf
        @method('DELETE')
        <span class="timestamp">Posted {{ $tweet->timestamp }}.
            <button type="submit" class="btn">Delete</button>
        </span>
    </form>
</li>
