<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterApiTest extends TestCase
{
    /**
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /**
     * @return json
     */
    public function should_create_user_and_return_user_info()
    {
        $data = [
          'name' => 'vuesplash user',
          'email' => 'kubota@miyu.com',
          'password' => 'kubotamiyu',
          'password_confirmation' => 'kubotamiyu',
        ];

        $response = $this->json('POST', route('register'), $data);

        $user = User::first();
        $this->assertEquals($data['name'], $user->name);

        $response
          ->assertStatus(201)
          ->assertJson(['name' => $user->name]);
    }
}
