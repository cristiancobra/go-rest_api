<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RootTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_root_wihtout_user_returns_a_redirect_response()
    {
        $response = $this->get('/');

        $response->assertStatus(302)
				->assertRedirect('/user/create');
    }
}
