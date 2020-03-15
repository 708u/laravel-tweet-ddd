@extends('layouts.app')

@section('title')
<x-partial.title title='Home'/>
@endsection

@section('content')
<div class="center jumbotron">
    <h1 class="text-center">Welocome to Laravel tweet
    </h1>
    <p class="text-center">
        Laravelでtwitter風アプリケーションをドメイン駆動設計で開発するプロジェクト
    </p>
    <button class="btn btn-outline-primary">Sign Up here</button>
</div>
@endsection
