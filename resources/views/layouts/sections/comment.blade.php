@foreach($items as $key=>$item)
    <div id="comment-id_{{ $item->id }}" class="media">
        <a href="" class="pull-left">
            @php($hash = isset($item->email) ? md5($item->email) : md5($item->user->email))
            <img alt="gravatar" src="https://www.gravatar.com/avatar/{{ $hash }}?d=mm&s=70" class="media-object">
        </a>
        <div class="media-body">
            <h4 class="media-heading">
                {{ $item->name }}
            </h4>
            <p class="text-muted">
                {{ $item->created_at->diffForHumans() }}
            </p>
            <p>
                {{ $item->message }}
            </p>
            <a class="reply" data-comment_id="{{ $item->id }}" href="#">Ответить</a>
        </div>
        @if( isset( $commentsGroup[$item->id] ) )
            @include('layouts.sections.comment', [ 'items' => $commentsGroup[$item->id] ])
        @endif
    </div>
@endforeach