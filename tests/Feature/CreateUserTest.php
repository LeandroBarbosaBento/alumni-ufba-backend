<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    /* public function test_create_user_success(): void
    {
        $response = $this->post('/api/auth/create-account', [
            'name' => 'Nome de usuário',
            'email' =>'NewUser123456asdfasdf@email.com',
            'password' => 'password',
            'cpf' => '218984678645456asdf',
            'course_id' => '1',
            'grad_year' => '2022',
            'city' => 'Salvador',
            'state' => 'Bahia',
            'country' => 'Brasil',
            'description' => 'Ex estudante da UFBA'
        ]);

        $response->assertStatus(200);
    } */

    public function test_create_user_error(): void
    {
        $response = $this->post('/api/auth/create-account', [
            'name' => 'Nome de usuário',
            'email' =>'leandro123@email.com',
            'password' => 'password',
            'cpf' => '218984678645456',
            'course_id' => '1',
            'grad_year' => '2022',
            'city' => 'Salvador',
            'state' => 'Bahia',
            'country' => 'Brasil',
            'description' => 'Ex estudante da UFBA'
        ]);

        $response->assertStatus(400);
    }
}
