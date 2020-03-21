@extends('layouts.app')

@section('title')
<x-partial.title title='User Profile'/>
@endsection

@section('content')
<div>
    {{ $user->userName }}
</div>
<div>
    {{ $user->email }}
</div>
@endsection
