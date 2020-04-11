@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <aside class="col-md-4">
            <x-frontend.user.info :user="$user" :feeds="$feeds"/>
            <x-frontend.tweets.form/>
        </aside>
        <div class="col-md-8">
            <h3>Tweet Feed</h3>
            <ol class="tweets">
                @foreach ($feeds as $feed)
                    <x-frontend.tweets.tweet :tweet="$feed"/>
                @endforeach
            </ol>
        </div>
    </div>
</div>
@endsection
