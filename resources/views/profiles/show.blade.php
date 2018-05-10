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
                    @if($activities->count() == 0)
                    <h3>No Thread Created</h3>
                    @else
                    <h3>Activities of {{$profileUser->name}}</h3>
                        @foreach($activities as $date => $activity) 
                            <h3>{{$date}}</h3>
                            @foreach($activity as $record)
                                @include("profiles.activities.{$record->type}", ['activity' => $record])
                            @endforeach
                        @endforeach
                        {{-- {{$activity->links()}} --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
