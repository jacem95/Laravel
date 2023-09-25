<?php

namespace Tests\Feature;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    //Pour refresh la databse a chaque excecution des test (SqlLite)
    use RefreshDatabase;

    public function testValidRegistration()
    {

        $count = User::count();

        $response = $this->post('/register', [
            'email' => 'florent@nicolas.com',
            'name' => 'test',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $newCount = User::count();

        $this->assertNotEquals($count, $newCount);
    }
}
