@extends('layouts.app')

<style>
    .post-content-details {
        font-size: 10px;
    }
    .post-content-body {
        font-size: 18px;
        font-weight: 600;
    }
    .post-form textarea {
        width: 90% !important;
    }
    .post-form input[type="text"] {
        width: 90%;
    }
</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">User Posts</div>

                    <div class="panel-body">

                            <div class="post-block" id="post{{ $post->id }}">
                                <div class="post-content-body">
                                    {{ $post->content }}
                                </div>
                                <div class="post-content-details">
                                    <div class="post-content-user">
                                        {{ $post->user->name }}
                                    </div>
                                    <div class="post-content-date">
                                        {{ $post->created_at }}
                                    </div>
                                    <div class="post-content-comments-count"> Comments <span class="badge">{{ count($post->comments) }}</span> </div>
                                </div>
                                <div class="comments-block">
                                    @foreach($post->comments as $comment)
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




                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
