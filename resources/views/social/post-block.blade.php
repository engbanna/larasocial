<div class="post-block" id="post{{ $post->id }}">
    <div class="post-actions">
        <a href="{{ URL::to('posts/'.$post->id) }}">Show</a> |
        <a class="deleteConfirm" href="{{ URL::to('posts/delete/'.$post->id) }}">Delete</a>
    </div>
    @if($post->post_type == 'video')
        @include('social.post-content-videoPost', ['post' => $post, ])
    @elseif($post->post_type == 'image')
        @include('social.post-content-imagePost', ['post' => $post, ])
    @else
        @include('social.post-content-textPost', ['post' => $post, ])
    @endif


    <div class="post-content-details">
        <div class="post-content-user">
            {{ $post->user->name }}
        </div>
        <div class="post-content-date">
            {{ $post->created_at }}
        </div>
        <div class="post-content-comments-count"> Comments <span class="badge">{{ count($post->comments) }}</span>
            <a class="show-comments">Show Comments</a>
        </div>
    </div>

    @include('social.comments-block', ['post' => $post, ])





</div>