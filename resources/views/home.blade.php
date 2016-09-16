@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Posts</div>

                <div class="panel-body timeline">
                    <div class="post-form">
                        
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#textPost">Textual Post</a></li>
                            <li><a data-toggle="tab" href="#imagePost">Image Post</a></li>
                            <li><a data-toggle="tab" href="#videoPost">Video Post</a></li>
                        </ul>
                        <div class="tab-content">
                                <div id="textPost" class="tab-pane fade in active">
                                    <form action="{{ URL::to('posts') }}" method="post">
                                        {{ csrf_field() }}
                                        <textarea name="content" placeholder="Your Text Here" required></textarea>
                                        <input type="hidden" name="post_type" value="text" />
                                        <button class="btn btn-success" > Add Post</button>
                                    </form>
                                </div>
                            <div id="imagePost" class="tab-pane fade">
                                <form action="{{ URL::to('posts') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <textarea name="content" placeholder="Your Text Here"></textarea>
                                    <input type="file" name="image" />
                                    <input type="hidden" name="post_type" value="image" required/>
                                    <button class="btn btn-success" > Add Post</button>
                                </form>
                            </div>

                            <div id="videoPost" class="tab-pane fade">
                                <form action="{{ URL::to('posts') }}" method="post">
                                    {{ csrf_field() }}
                                    <textarea name="content" placeholder="Your Text Here"></textarea>
                                    <input type="text" name="url" placeholder="Youtube Link Here" value="" required/>
                                    <input type="hidden" name="post_type" value="video" />
                                    <button class="btn btn-success" > Add Post</button>
                                </form>
                            </div>

                        </div>
                    </div>

                    <hr>
                    @foreach($posts as $post)
                        @include('social.post-block', ['post' => $post])
                        <hr>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
