  <div class="panel panel-default">
                <div class="panel-heading">
                  <a href="{{ $reply->path() }}"><i>{{ $reply->owner->name}}</i></a> said {{ $reply->created_at->diffForHumans()}}.....
                </div>
                <div class="panel-body" style="background-color: #92FFA4FF">
                    {{ $reply->body }}
                </div>
    </div>