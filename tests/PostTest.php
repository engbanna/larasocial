<?php

use App\Comment;
use App\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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
        $post = new Post();
        $post->content = 'My Post Content';
        $post->save();

        $comment1 = new Comment();
        $comment1->text = 'my comment text';
        $comment1->post_id = $post->id;
        $comment1->save();

        $comment2 = new Comment();
        $comment2->text = 'my comment text2';
        $comment2->post_id = $post->id;
        $comment2->save();

        $post_comments = $post->Comments();
        $this->assertEquals(2, count($post_comments));



    }
}
