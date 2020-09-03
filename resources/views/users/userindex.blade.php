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
                <a href="{{route('newsletter.index')}}">newsletter</a>
                <br>
                <a href="{{route('post.index')}}">posts</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('USer page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('user.create')}}"> <button type="button" class="btn btn-primary">Add User</button></a>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                          <td>Number</td>
                                          <td>Roll no</td>
                                          <td>Name</td>
                                          <td>Mail</td>
                                          <td>Role</td>

                                          <td colspan = 2>Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $users)
                                        <tr>
                                            <td>{{$users->id}}</td>
                                            <td>{{$users->rollno}}</td>

                                            <td>{{$users->name}}</td>
                                            <td>{{$users->email}}</td>
                                            <td>{{$users->role}}</td>
                                            <td>
                                                <a href="{{ route('user.edit',$users->id)}}" class="btn btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('user.destroy', $users->id)}}" method="post">
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
