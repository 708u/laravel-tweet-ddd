@extends('layouts.app')

@section('title')
<x-partial.title title='All Users'/>
@endsection

@section('content')
<h1 class="text-center mt-2">All users</h1>

<div class="container">
    <x-frontend.user.users :users="$users"/>
    <div class="d-flex justify-content-center mt-4">{{ $users->links() }}</div>
</div>
@endsection
