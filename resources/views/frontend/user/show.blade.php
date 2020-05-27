@extends('layouts.app')

@section('title')
<x-partial.title title='User Profile'/>
@endsection

@section('content')
<div class="container mt-3">
    <div class="row justify-content-between">
        <aside class="col-md-4 col-md-offset-1">
            <section class="user_info">
                <h1>{{ $user->userName }}</h1>
            </section>
        </aside>
        <div class="col-md-7">
            <h3 class="mb-3">Tweets ({{ $tweets->total() }})</h3>
            <ol class="tweets">
                @foreach ($tweets as $tweet)
                    <x-frontend.tweets.tweet :tweet="$tweet"/>
                @endforeach
            </ol>
            <x-partial.pager :pager="$tweets" class="justify-content-left"/>
        </div>
    </div>
</div>
@endsection
