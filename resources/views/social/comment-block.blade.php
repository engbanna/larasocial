<div class="comment-block" id="comment{{ $comment->id }}">
    <div class="comment-content-body">
        {{ $comment->text }}
    </div>
    <div class="comment-content-details">
        <div class="post-content-user">
            {{ $comment->user->name }}
        </div>
        <div class="comment-content-date">
            {{ $comment->created_at }}
        </div>
        <div class="comment-content-replyes-count"> Replies <span class="badge">{{ count($comment->replies) }}</span>
            <a class="show-reply-form">Add Reply</a>
        </div>
    </div>
    <div class="replies-block">
        @foreach($comment->replies as $reply)
            <div class="reply-block" id="comment{{ $reply->id }}">
                <div class="comment-content-body">
                    {{ $reply->text }}
                </div>
                <div class="comment-content-details">
                    <div class="post-content-user">
                        {{ $reply->user->name }}
                    </div>
                    <div class="comment-content-date">
                        {{ $reply->created_at }}
                    </div>
                </div>
            </div>

        @endforeach
        <div class="reply-form">
            <form action="{{ URL::to('comments') }}" method="post">
                {{ csrf_field() }}
                <textarea name="text" placeholder="Your Reply Here" required></textarea>
                <input type="hidden" name="commentable_type" value="App\Entities\Comment" />
                <input type="hidden" name="commentable_id" value="{{ $comment->id }}" />
                <button class="btn btn-info btn-sm" > Add Reply</button>
            </form>
        </div>
    </div>

</div>