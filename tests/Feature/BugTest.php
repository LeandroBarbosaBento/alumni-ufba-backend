<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BugTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_bug(): void
    {

        $login_data = $this->post('/api/auth/login', [
            "email" =>"leandro@email.com",
            "password" => "password"
        ]);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $login_data['access_token']
        ])->post('api/bug/create', [
            'description' => 'Descrição de um bug',
        ]);

        $response->assertStatus(200);
    }
}
