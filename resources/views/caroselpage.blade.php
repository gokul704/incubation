@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Options
                </div>
                <div class="card-body">
                <a href="{{route('post.index')}}">posts</a>
                <br>
                <a href="{{route('newsletter.index')}}">newsletter</a>



                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Carosel page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as admin !') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
