@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-5">
        <x-frontend.user.profile :profileCardName="$profileCardTitle" :actionButton="$actionButton" userName="" email="">
            <x-slot name="formAction">
                {{ route('frontend.auth.signup') }}
            </x-slot>
            <x-slot name="httpMethod"></x-slot>
        </x-frontend.user.profile>
    </div>
</div>
@endsection
