<article>
    <div class="level">
    <h4 class="flex">{{$profileUser->name}} published <a href="{{$activity->subject->path()}}">{{$activity->subject->title}}</a></h4>
    @can('update', $activity)
        <form action="" method="POST">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button class="btn btn-default">Delete Thread</button>
        </form>
    @else
        {{$activity->created_at->diffForHumans()}}
    @endcan
    </div>
        <div class="body">{{ $activity->subject->body }}</div>
</article>
<br>