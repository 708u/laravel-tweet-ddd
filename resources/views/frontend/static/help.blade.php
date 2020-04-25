@extends('layouts.app')

@section('title')
<x-partial.title title='Help'/>
@endsection

@section('content')
<div class="uk-section uk-section-large uk-section-muted uk-padding-large">
    <h1 class="text-center">Help</h1>
    <hr>
    <p class="text-center">
        このアプリケーションは<a href="https://github.com/naoyaUda/laravel-tweet-ddd">このgithubリポジトリ</a>にて管理しています。
        バグ等にお気づきになりましたら、こちらにissue等を立てていただけると幸いです。
    </p>
</div>
@endsection
