@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-between">
        <aside class="col-md-4 col-md-offset-1">
            <x-frontend.user.info :user="$user" :feeds="$feeds"/>
            <x-frontend.tweets.form/>
        </aside>
        <div class="col-md-7">
            <h3>Tweet Feed</h3>
            <ol class="tweets">
                @foreach ($feeds as $feed)
                    <x-frontend.tweets.tweet :tweet="$feed"/>
                @endforeach
                <x-partial.pager :pager="$feeds" class="justify-content-center"/>
            </ol>
        </div>
    </div>
</div>
@endsection
