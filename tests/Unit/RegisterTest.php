<?php

namespace Sparkouttech\UserAuth\Tests\Unit;

use Sparkouttech\UserAuth\App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Sparkouttech\UserAuth\Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    private function data() {
        return [
            'name' => 'Sivabharathy',
            'email' => 'siva@sparkouttech.com',
            'password' => '12345678'
        ];
    }

    /** @test */
    public function create_new_user()
    {

        $this->withoutExceptionHandling();

        $response = $this->post('/auth/user/register', $this->data());

        $response->assertOk();

        $this->assertCount(1, User::all());

    }

}
