@extends('layouts.app')

@section('content')
<div class="uk-margin-large-top uk-margin-large-bottom uk-flex uk-flex-center">
    <x-frontend.user.profile :profileCardName="$profileCardTitle" :actionButton="$actionButton" userName="" email="">
        <x-slot name="formAction">
            {{ route('frontend.auth.signup') }}
        </x-slot>
        <x-slot name="httpMethod"></x-slot>
    </x-frontend.user.profile>
</div>
@endsection
