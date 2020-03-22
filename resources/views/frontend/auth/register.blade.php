@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-5">
        <x-frontend.user.profile :profileCardName="$profileCardTitle" :actionButton="$actionButton">
            <x-slot name="formAction">
                {{ route('frontend.auth.signup') }}
            </x-slot>
        </x-frontend.user.profile>
    </div>
</div>
@endsection
