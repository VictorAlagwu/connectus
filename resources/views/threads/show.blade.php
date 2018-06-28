@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">{{$thread->title}}</div>
                <div class="panel-body">
                    <article>
                        {{$thread->body}}
                    </article>
                </div>
            </div>
       
         @foreach ($replies as $reply)
                @include('threads.reply')
        @endforeach
            {{$replies->links()}}
        @if(auth()->check())
           <form method="POST" action="{{ $thread->path().'/replies' }}">
           {{  csrf_field()}}
           <div class="form-group">
            <textarea name="body" id="body" class="form-control" placeholder="Enter your reply..." rows="3"></textarea>
           </div>
           <button class="btn btn-default" type="submit">Post</button>
           </form>
        @else
           <p class="text-center">Please <a href="/login">Sign-In</a> to reply this thread</p> 
        @endif
         </div>
        <div class="col-md-4">
             <div class="panel panel-default">
                <div class="panel-body">
               <p>This thread was created at 
                    {{$thread->created_at->diffForHumans()}} by <a href="{{route('profile',$thread->user->name)}}">{{$thread->user->name }} </a>
                    and has {{ $thread->replies_count }} {{ str_plural('comment',$thread->replies_count)}}</p>
                </div>
            </div>
        </div>
    </div>

           

</div>
@endsection
