@extends('layouts.app')

@section('title')
<x-partial.title title='Home'/>
@endsection

@section('content')
<div class="center jumbotron jumbotron-fluid">
    <h1 class="text-center">Welcome to Laravel tweet</h1>
    <hr class="my-4">
    <p class="text-center">
        Laravelでtwitter風アプリケーションをドメイン駆動設計で開発するプロジェクト
    </p>
    <a href="{{ route('frontend.auth.signup') }}">
        <button class="btn btn-outline-primary mx-auto d-block">Sign Up here</button>
    </a>
</div>
@endsection
