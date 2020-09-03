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
                <a href="{{route('home')}}">Home</a>
                {{-- <a href="{{route('newsletter.index')}}">newsletter</a> --}}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('post.create')}}"> <button type="button" class="btn btn-primary">create post</button></a>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                          <td>Number</td>
                                          <td>Title</td>
                                          <td>subtitle</td>
                                          <td>Image</td>
                                          <td>Body</td>
                                          <td>Posted By</td>
                                          <td colspan = 2>Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($post as $posts)
                                        <tr>
                                            <td>{{$posts->id}}</td>
                                            <td>{{$posts->title}}</td>
                                            <td>{{$posts->subtitle}}</td>
                                        <td><img src="{{ URL::to('/') }}/images/{{ $posts->image }}" width="50%"></td>
                                            <td>{{$posts->body}}</td>
                                            <td>{{$posts->postedby}}</td>
                                            <td>
                                                <a href="{{ route('post.edit',$posts->id)}}" class="btn btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('post.destroy', $posts->id)}}" method="post">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  </table>

                            </div>
                        </div>
                    </div>
                    {{-- {{ __('You are logged in as author and you are in posts page !') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
