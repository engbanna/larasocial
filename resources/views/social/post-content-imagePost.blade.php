<div class="post-content-body">
    <a href="{{ URL::to('posts/'.$post->id) }}">{{ $post->content }}</a>
    <div class="post-image">
        <img src="uploads/{{ $post->imagePost->url }}" />
    </div>

</div>
