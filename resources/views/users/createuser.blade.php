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
                {{-- <a href="{{route('newsletter.index')}}">newsletter</a> --}}

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm">
                            @if(count($errors)>0)
                            <div class="alert-alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        <form action="{{route('user.store')}}"  method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                   <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control"  name="name" placeholder="" id="exampleInputEmail1" aria-describedby="emailHelp">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Roll No</label>
                                    <input type="text" class="form-control" name="rollno" placeholder="" id="exampleInputEmail1" aria-describedby="emailHelp">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">mail</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">password</label>
                                    <input type="password" class="form-control" name="password" id="exampleInputEmail1">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Role</label>
                                    <input type="number" placeholder="1/2" class="form-control" name="role" id="exampleInputEmail1">
                                  </div>


                                <button type="submit" class="btn btn-success">Create</button>
                            </form>
                        </div>
                    </div>

                    {{-- {{ __('You are logged in as author and you are in posts page !') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
