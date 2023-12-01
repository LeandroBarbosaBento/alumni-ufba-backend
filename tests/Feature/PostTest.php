<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_post(): void
    {

        $login_data = $this->post('/api/auth/login', [
            "email" =>"leandro@email.com",
            "password" => "password"
        ]);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $login_data['access_token']
        ])->post('api/post/create', [
            'title' => 'TEST TITLE',
            'content' => 'This is the content of the test post.',
            'category_id' => 1
        ]);

        $response->assertStatus(200);
    }

    public function test_delete_post(): void
    {

        $post = Post::latest()->first();
        $login_data = $this->post('/api/auth/login', [
            "email" =>"leandro@email.com",
            "password" => "password"
        ]);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $login_data['access_token']
        ])->delete('api/post/' . $post->id);

        $response->assertStatus(200);
    }

}
