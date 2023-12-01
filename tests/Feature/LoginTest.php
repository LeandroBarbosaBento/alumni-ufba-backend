<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{

    public function test_login_code(): void
    {
        $response = $this->post('/api/auth/login', [
            "email" =>"leandro@email.com",
            "password" => "password"
        ]);

        $response->assertStatus(200);
    }

    public function test_is_authenticated(): void
    {
        $response = $this->post('/api/auth/login', [
            "email" =>"leandro@email.com",
            "password" => "password"
        ]);

        $this->assertAuthenticated();
    }

    public function test_wrong_password(): void
    {
        $response = $this->post('/api/auth/login', [
            "email" =>"leandro@email.com",
            "password" => "passwordasfasdf"
        ]);

        $response->assertStatus(500);
    }
}
