@extends('layouts.app')

@section('content')
<div class="container-fluid">
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
                <br>
                <a href="{{route('user.index')}}">User Mangement</a>



                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in as admin !') }} --}}
                    <div class="container">
                        <h3 style="text-align: center;">Contact Queries</h3>
                        <div class="row">
                            <div class="col-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                          <td>Number</td>
                                          <td>Name</td>
                                          <td>Email</td>
                                          <td>Subject</td>
                                          <td>Text</td>
                                          <td>Time </td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contact as $users)
                                        <tr>
                                            <td>{{$users->id}}</td>
                                            <td>{{$users->name}}</td>

                                            <td>{{$users->email}}</td>
                                            <td>{{$users->subject}}</td>
                                            <td>            @if(strlen($users->message) > 50)
                                                {{substr($users->message,0,50)}}
                                                <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
                                                <span class="read-more-content"> {{substr($users->message,100,strlen($users->message))}}
                                                <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
                                                @else
                                                {{$users->message}}
                                                @endif</td>
                                        <td>{{$users->created_at->diffForHumans()}}</td>
                                             </tr>
                                        @endforeach

                                    </tbody>
                                  </table>
                                  <div class="d-flex justify-content-center">
                                    {!! $contact->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
