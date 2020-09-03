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
                <div class="card-header">{{ __('Post page') }}</div>

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
                        <form action="{{route('post.store')}}"  method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                   <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" class="form-control"  name="title" placeholder="Title" id="exampleInputEmail1" aria-describedby="emailHelp">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Sub Title</label>
                                    <input type="text" class="form-control" name="subtitle" placeholder="sub tite" id="exampleInputEmail1" aria-describedby="emailHelp">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlFile1">Image</label>
                                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                                  </div>
                                  <div class="form-group">
                                      <div class="overflow-hidden">


                                    <label for="exampleFormControlTextarea1">Body</label>
                                    <textarea class="form-control"  name="body" id="exampleFormControlTextarea1"maxlength = "500" min-height="20px" rows="3"></textarea>
                                  </div>
                                </div>
                                <button type="submit" class="btn btn-success">post</button>
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
