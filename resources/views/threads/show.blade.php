@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $thread->title }}</div>
                <div class="panel-body">
                    <article>
                        {{ $thread->body }}
                    </article>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach ($thread->replies as $reply)
                @include('threads.reply')
            @endforeach
        </div>
    </div>
    @if(auth()->check())
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           <form method="POST" action="{{ $thread->path().'/replies' }}">
           {{  csrf_field()}}
           <div class="form-group">
            <textarea name="body" id="body" class="form-control" placeholder="Enter your reply..." rows="3"></textarea>
           </div>
           <button class="btn btn-default" type="submit">Post</button>
           </form>
        @else
           <p class="text-center">Please <a href="/login">Sign-In</a> to reply this thread</p> 
        </div>
    
    </div>
    @endif
</div>
@endsection
