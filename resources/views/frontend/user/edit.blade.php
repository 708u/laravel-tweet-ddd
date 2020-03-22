@extends('layouts.app')

@section('title')
{{-- content here --}}
<x-partial.title title='Edit Profile'/>
@endsection

@section('content')
<div class="container padding mt-3">
    <h1 class="text-center">Update your profile</h1>
    <div class="row justify-content-center">
    <x-frontend.user.profile/>
    </div>
</div>
@endsection
