@foreach ($alertTags as $alert)
    @if ($message = session($alert))
        <div class="alert {{ $alert }}" role="alert">
            {{ $message }}
        </div>
    @endif
@endforeach
