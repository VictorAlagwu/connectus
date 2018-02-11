@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Forum Threads</div>

                <div class="panel-body">
                    @foreach ($threads as $thread)
                        <article>
                            <h4><a href="{{ $thread->path() }}">{{ $thread->title }}</a></h4>
                            <div class="body">{{ $thread->body }}</div>
                        </article>
                    @endforeach
                </div>
                @if (auth()->check())
                <div class="text-center" style="padding: 20px 30px 30px 30px;">
                    <form method="POST" action="/threads">
                    {{ csrf_field()}}
                        <div class="form-group">
                            <label class="form-label">
                                Title
                            </label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Thread Title..." />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Thread Body</label>
                            <textarea class="form-control" name="body" id="body" placeholder="Enter Thread Body..."></textarea>
                        </div>
                        <button class="btn btn-default" type="submit" name="submit">Create Thread</button>
                    </form>
                </div>
                @else
                <div class="text-center" style="padding: 20px 30px 30px 30px;">
                    Please <a href="/login">Sign-In</a> to create a new thread
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
