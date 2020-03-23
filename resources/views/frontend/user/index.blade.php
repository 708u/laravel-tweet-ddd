@extends('layouts.app')

@section('title')
<x-partial.title title='All Users'/>
@endsection

@section('content')
<h1 class="text-center mt-2">All users</h1>

<div class="container">
    <ul class="users">
        @foreach ($users as $user)
        <li>
            <a href="{{route('frontend.user.show', ['uuid' => $user->identifier])}}">{{ $user->userName }}</a>
        </li>
        @endforeach
        </li>
    </ul>
</div>
@endsection
