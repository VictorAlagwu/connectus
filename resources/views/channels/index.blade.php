@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$channel}} Threads</div>

                <div class="panel-body">
                    @foreach ($threads as $thread)
                        <article>
                            <div class="level">
                                 <h4 class="flex"><a href="{{ $thread->path() }}">{{ $thread->title }}</a></h4>
                                 <strong<a href="{{ $thread->path() }}">No of Replies: {{ $thread->replies_count}}</strong>
                            </div>

                            <div class="body">{{ $thread->body }}</div>
                        </article>
                        
                    @endforeach
                </div>
              
            </div>
        </div>
    </div>
</div>
@endsection
