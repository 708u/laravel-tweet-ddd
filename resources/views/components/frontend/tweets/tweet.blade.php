@foreach ($tweets as $tweet)
    <li id="tweet-{{ $tweet->identifier }}">
        <span class="user"><a href="{{ 'frontend.user.show', ['uuid' => $tweet->identifier] }}"></a></span>
        <span class="content">{{ $tweet->content }}</span>
        <span class="timestamp">Posted {{ $tweet->timestamp }}.</span>
    </li>
@endforeach
