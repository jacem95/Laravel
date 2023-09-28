<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RouteTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    //On check que si une personne pas co est redirigé vers login
    public function testAccessAdminWithGuestRole()
    {
        $response = $this->get('/admin/articles');
        $response->assertRedirect('/login');
    }

    public function testAccessAdminWithAdminRole()
    {
        $admin = User::create([
            'email' => 'admin@admin.com',
            'name' => 'adminbbbb',
            'password' => Hash::make('toor'),
            'role' => User::ADMIN_ROLE
        ]);

        $this->actingAs($admin);
        $response = $this->get('/admin/articles');
        $response->assertStatus(200);
    }

    public function testConnection()
    {
        $reponse = $this->post('/login', [
            'email' => 'admin@admin.com',
            'name' => 'Admin',
            'password' => 'toor',
            'role' => 'ADMIN'
        ]);

        //$response = $this->get('/admin/articles');
        $reponse->assertRedirect('/');
    }
}
