@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a New Thread</div>

                <div class="panel-body">
                @if (auth()->check())
            
                    <form method="POST" action="/threads">
                    {{ csrf_field()}}
                    <div class="form-group">
                        <label class="form-label">
                        </label>
                         <select class="form-control" id="channel_id" name="channel_id">
                            <option >Choose...</option>
                            @foreach($channels as $channel)
                            <option value="{{$channel->id}}">{{title_case($channel->name)}}</option>
                           @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                            <label class="form-label">
                                Title
                            </label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Thread Title..."  />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Thread Body</label>
                            <textarea class="form-control" name="body" id="body" rows="8" placeholder="Enter Thread Body..."></textarea>
                        </div>
                        <button class="btn btn-default" type="submit" name="submit">Create Thread</button>
                        @if(count($errors))
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </form>
                @else
                             <p>Please <a href="/login">Sign-In</a> to create a new thread</p>

                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
