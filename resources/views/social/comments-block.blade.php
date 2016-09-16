<div class="comments-block">
    @foreach($post->comments as $comment)
        @include('social.comment-block', ['comment' => $comment])
        <hr>
    @endforeach

    <div class="comment-form">
        <form action="{{ URL::to('comments') }}" method="post">
            {{ csrf_field() }}
            <textarea name="text" placeholder="Your Comment Here" required></textarea>
            <input type="hidden" name="commentable_type" value="App\Entities\Post" />
            <input type="hidden" name="commentable_id" value="{{ $post->id }}" />
            <button class="btn btn-info btn-sm" > Add Comment</button>
        </form>
    </div>


</div>
