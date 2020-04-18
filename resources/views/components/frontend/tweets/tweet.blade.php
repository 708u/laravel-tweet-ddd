<li id="tweet-{{ $tweet->tweet->identifier }}" class="tweet-list">
    <span class="user"><a href="{{ route('frontend.user.show', ['uuid' => $tweet->tweet->userId]) }}">{{ $tweet->tweet->username }}</a></span>
    <div>
        @if (count($tweet->postedPictures) > 0)
            @foreach ($tweet->postedPictures as $postedPicture)
                <img src="{{ Storage::disk('s3')->url($postedPicture->fullPath) }}" alt="">
            @endforeach
        @endif
    </div>
    <span class="content">{{ $tweet->tweet->tweetContent }}</span>
    @if(Auth::id() === $tweet->tweet->userId)
        <form method="POST" action="{{ route('frontend.tweet.destroy', ['tweetUuid' => $tweet->tweet->identifier]) }}">
            @csrf
            @method('DELETE')
            <span class="timestamp">Posted {{ $tweet->tweet->timestamp }}.
                <button type="submit" class="btn">Delete</button>
            </span>
        </form>
    @endif
</li>
