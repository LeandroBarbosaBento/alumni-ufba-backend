<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;

class EventTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_event(): void
    {

        $login_data = $this->post('/api/auth/login', [
            "email" =>"leandro@email.com",
            "password" => "password"
        ]);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $login_data['access_token']
        ])->post('api/events', [
            'title' => 'Novo evento',
            'date' => '2023-10-20 14:16:39',
            'where' => 'Salvador',
            'description' => 'Descrição do evento'
        ]);

        $response->assertStatus(200);
    }

    public function test_update_event(): void
    {

        $login_data = $this->post('/api/auth/login', [
            "email" =>"leandro@email.com",
            "password" => "password"
        ]);

        $event = Event::latest()->first();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $login_data['access_token']
        ])->post('api/events/' . $event->id, [
            'title' => 'Novo evento editado',
            'date' => '2023-10-20 14:16:39',
            'where' => 'Salvador',
            'description' => 'Descrição do evento'
        ]);

        $response->assertStatus(200);
    }

    public function test_delete_event(): void
    {

        $login_data = $this->post('/api/auth/login', [
            "email" =>"leandro@email.com",
            "password" => "password"
        ]);

        $event = Event::latest()->first();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $login_data['access_token']
        ])->delete('api/events/' . $event->id);

        $response->assertStatus(200);
    }
}
