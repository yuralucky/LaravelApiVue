<?php

namespace Tests\Feature;

use App\Comment;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/api/comments/');

        $response->assertStatus(200);
    }

    public function testCreateComment()
    {
        $data = ['body' => 'body'];
        $this->post(route('comments.store'), $data)->assertStatus(201)->assertJson($data);
    }

    public function testUpdateComment()
    {
        $comment = Comment::create(['body' => 'body']);
        $data = ['body' => 'new body'];

        $this->put(route('comments.update', $comment->id), $data)->assertStatus(200)->assertJson($data);
    }

    public function testShowComment()
    {
        $comment = Comment::create(['body' => 'body']);

        $this->get(route('comments.show', $comment->id))->assertStatus(200);
    }

    public function testDestroyComment()
    {
        $comment = Comment::create(['body' => 'body']);

        $this->delete(route('comments.destroy', $comment->id))->assertStatus(204);
    }
}
