<?php

use App\Entities\Comment;
use App\Entities\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

class PostTest extends TestCase
{
    /** @test */
    public function add_textual_post()
    {
        $this->visit('/')
            ->see('Laravel');

    }

    /** @test */
    public function each_post_can_have_comments()
    {
        $user_id = 1;

        $post = new Post();
        $post->content = 'My Test Post Content';
        $post->post_type = 'text';
        $post->user_id = $user_id;
        $post->save();


        $comment1 = new Comment();
        $comment1->text = 'my comment text';
        $comment1->commentable_type = 'App\Entities\Post';
        $comment1->commentable_id = $post->id;
        $comment1->user_id = $user_id;
        $comment1->save();


        $comment2 = new Comment();
        $comment2->text = 'my comment text2';
        $comment2->commentable_type = 'App\Entities\Post';
        $comment2->commentable_id = $post->id;
        $comment2->user_id = $user_id;
        $comment2->save();

        $post_comments = $post->comments;
        $this->assertEquals(2, count($post_comments));



    }

    /** @test */
    public function each_post_can_have_comments_by_repository()
    {
        $user_id = 1;

        $postRepository = app('\App\Repositories\PostRepositoryEloquent');
        $attrs['user_id'] =  $user_id;
        $attrs['content'] =  'My Test Post Content00';
        $attrs['post_type'] =  'text';
        $post = $postRepository->create($attrs);


        $commentRepository = app('\App\Repositories\CommentRepositoryEloquent');
        $comment1['user_id'] =  $user_id;
        $comment1['text'] =  'my comment text10';
        $comment1['commentable_type'] =  'App\Entities\Post';
        $comment1['commentable_id'] =  $post->id;
        $commentRepository->create($comment1);


        $comment2['user_id'] =  $user_id;
        $comment2['text'] =  'my comment text11';
        $comment2['commentable_type'] =  'App\Entities\Post';
        $comment2['commentable_id'] =  $post->id;
        $commentRepository->create($comment2);

        $post_comments = $post->comments;
        $this->assertEquals(2, count($post_comments));



    }


}
