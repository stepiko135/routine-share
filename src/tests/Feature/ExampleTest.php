<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->get('/')->assertOk();
        $this->post('/login', [
            'email'    => 'test2@test.com',
            'password' => 'password'
        ]);
        $this->get('/home')->assertStatus(200);

        $this->get('/profile')->assertStatus(200);
        $this->get('/profile/ヒロ/edit')->assertStatus(200);
        $this->put('/profile/ヒロ/',[
            'profile' => 'Test Profile Update'
        ])->assertStatus(302);

        $this->get('/routine')->assertStatus(405);
        $this->get('/routine/1')->assertStatus(200);
        $this->post('/routine', [
            'user_id' => 2,
            'name' => 'Testルーティン',
            'desc' => 'Testルーティンです。'
        ])->assertStatus(302);
        $this->patch('/routine/2', [
            'id' => 2,
            'user_id' => 2,
            'name' => 'Testルーティンアップデート',
            'desc' => 'Testルーティンアップデートです。'
        ])->assertStatus(302);
        $this->delete('/routine/1')->assertStatus(302);

    }
}
