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
                <br>
                <a href="{{route('post.index')}}">Posts</a>
                <br>
                <a href="{{route('user.index')}}">User Managaement</a>
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
                    <a href="{{route('newsletter.create')}}"> <button type="button" class="btn btn-primary">create newsletter</button></a>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                          <td>Number</td>
                                          <td>Title</td>
                                          <td>subtitle</td>
                                          <td>File</td>
                                          <td>Body</td>
                                          <td>Posted By</td>
                                          <td colspan = 2>Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($newsletter as $newslettesr)
                                        <tr>
                                            <td>{{$newslettesr->id}}</td>
                                            <td>{{$newslettesr->title}}</td>
                                            <td>{{$newslettesr->subtitle}}</td>
                                        <td><a href="{{ URL::to('/') }}/docs/{{ $newslettesr->file }}">view</a>     </td>
                                            <td>{{$newslettesr->body}}</td>
                                            <td>{{$newslettesr->postedby}}</td>
                                            <td>
                                                <a href="{{ route('newsletter.edit',$newslettesr->id)}}" class="btn btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('newsletter.destroy', $newslettesr->id)}}" method="post">
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
