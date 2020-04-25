@extends('layouts.app')

@section('title')
{{-- content here --}}
<x-partial.title title='Edit Profile'/>
@endsection

@section('content')
<div class="container padding mt-3">
    <h1 class="text-center">Update your profile</h1>
    <div class="uk-margin-large-top uk-margin-large-bottom uk-flex uk-flex-center">
        <x-frontend.user.profile profileCardName="Edit" actionButton="Save Changes" :userName="$user->userName" :email="$user->email">
            <x-slot name="formAction">
                {{ route('frontend.user.update', ['uuid' => $uuid]) }}
            </x-slot>
            <x-slot name="httpMethod">
                @method('PUT')
            </x-slot>
        </x-frontend.user.profile>
    </div>
</div>
@endsection
