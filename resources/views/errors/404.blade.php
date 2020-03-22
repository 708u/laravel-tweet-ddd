@extends('layouts.app')

@section('title')
<x-partial.title title='Page Not Found'/>
@endsection

@section('content')
<h1 class="text-center">404 Not found</h1>
<p class="text-center">指定されたページが見つかりませんでした。</p>
<a class="text-decoration-none" href="/">
    <button class="btn btn-outline-secondary px-5 py-2 my-5 mx-auto d-block" role="button">トップページ</button>
</a>
@endsection
