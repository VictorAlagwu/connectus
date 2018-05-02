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

                    Welcome to your profile page {{$profileUser->name}}
                    <p>Your account was created {{$profileUser->created_at->diffForHumans()}}
                    <p>Your Email is {{$profileUser->email}}</p>
                    @if($threads->count() == 0)
                    <h3>No Thread Created</h3>
                    @else
                    <h3>Threads Created By {{$profileUser->name}}</h3>
                        @foreach($threads as $thread) 
                        <article>
                            <div class="level">
                                <h4 class="flex"><a href="{{$thread->path()}}">{{ $thread->title }}</a></h4>
                            @can('update', $thread)
                                <form action="{{$thread->path()}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-default">Delete Thread</button>
                                </form>
                            @else
                                {{$thread->created_at->diffForHumans()}}
                            @endcan
                            </div>
                                <div class="body">{{ $thread->body }}</div>
                        </article>
                        <br>
                        @endforeach
                        {{$threads->links()}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
