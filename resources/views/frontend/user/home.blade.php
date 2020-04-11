@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <aside class="col-md-4">
            <x-frontend.user.info/>
        </aside>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
