<ul class="users">
    @foreach ($users as $user)
    <li>
        <a href="{{route('frontend.user.show', ['uuid' => $user->identifier])}}">{{ $user->userName }}</a>
    </li>
    @endforeach
    </li>
</ul>
