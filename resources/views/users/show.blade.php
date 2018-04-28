@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to your profile {{$user->name}}
                    <p>Your account was created {{$user->created_at->diffForHumans()}}
                    <p>Your Email is {{$user->email}}</p>
                    @if($user->threads->count() == 0)
                    <h3>No Thread Created</h3>
                    @else
                    <h3>Threads Created</h3>
                    @foreach($user->threads as $thread)
                    
                       <a href></ <p>{{$thread->title}}</p>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
