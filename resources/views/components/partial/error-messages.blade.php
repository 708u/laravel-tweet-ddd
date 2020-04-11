@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
        <p class="mb-auto">{{ $error }}</p>
        @endforeach
    </div>
@endif
