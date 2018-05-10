<article>
    <div class="level">
    <h4 class="flex">{{$profileUser->name}} replied <a href="{{$activity->subject->thread->path()}}">{{$activity->subject->thread->title}}</a></h4>
    @can('update', $activity)
        <form action="" method="POST">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button class="btn btn-default">Delete Reply</button>
        </form>
    @else
        {{$activity->created_at->diffForHumans()}}
    @endcan
    </div>
    {{$activity->created_at->diffForHumans()}}
        <div class="body">{{ $activity->subject->body }}</div>
</article>
<br>