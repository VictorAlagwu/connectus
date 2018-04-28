  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="level">
        <h5 class="flex">
          <a href="{{ $reply->path() }}">
            <i>{{ $reply->owner->name}}</i>
          </a> said {{ $reply->created_at->diffForHumans()}}.....
        </h5>
      <div>
  
          <form method="POST" action="/replies/{{ $reply->id }}/favorites">
             {{ csrf_field() }}
            <button type="submit" class="btn btn-default" {{$reply->isFavorited() ? 'disabled' : ''}}>{{$reply->favorites_count}} {{str_plural('Favorite', $reply->favorites_count ) }}</button>
          </form>
      </div>
    </div>
  </div>
  @if (Auth::check())
  <div class="panel-body" style="background-color: #92FFA4FF">
      {{ $reply->body }}
  </div>
  @endif
  </div>