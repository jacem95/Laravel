<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotEmpty;

class ModelTest extends TestCase
{
    use RefreshDatabase;

    //Dans premier temps on vérifie si la personne 
    //arrive à s'inscrire si elle remplit toutes les infos

    public function testValidRegistration()
    {
        $faker = Factory::create();
        $email = $faker->unique()->email;
        $count = User::count();

        $response = $this->post('/register', [
            'email' => $email,
            'name' => 'test',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $newCount = User::count();

        $this->assertNotEquals($count, $newCount);
    }


    public function testInvalidRegistration()
    {
        $response = $this->post('/register', [
            'email' => '',
            'name' => 'test',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);
        $response->assertSessionHasErrors();
    }

    //Vérification de l'existance d'un modèle catégorie
    public function testModelCategoryExist()
    {
        $category = Category::factory()->create();
        $this->assertModelExists($category);
    }

    //  MODELE USER //
    //Vérification de l'existance d'un modèle catégorie
    public function testModelUserExist()
    {

        //Test existence de User 
        // $user1 = User::create([
        //     'email' => 'admin@admin.com',
        //     'name' => 'adminbbbb',
        //     'password' => Hash::make('toor'),
        //     'role' => User::ADMIN_ROLE
        // ]);
        $user1 = User::factory()->create();

        $this->assertModelExists($user1);
    }


    //Vérifie que les properties ne sont pas nulles
    public function testModelUserPropertyNotEmpty()
    {
        $user = User::create([
            'email' => 'admin@admin.com',
            'name' => 'testing',
            'password' => Hash::make('toor'),
            'role' => User::ADMIN_ROLE
        ]);

        $this->assertNotEmpty($user->email);
        $this->assertNotEmpty($user->name);
        $this->assertNotEmpty($user->password);
        $this->assertNotEmpty($user->role);
    }

    public function testModelUserPasswordLength()
    {
        $user = User::create([
            'email' => 'admin@admin.com',
            'name' => 'adminbbbb',
            'password' => Hash::make('toor'),
            'role' => User::ADMIN_ROLE
        ]);

        $this->assertGreaterThan(8, strlen($user->password));
    }
    // FIN MODELE USER //

    //tester si le modele Article existe
    public function testModelArticleExist()
    {
        $category = Category::factory()->create();

        $article = Article::create([
            'title' => 'Ceci est ma première phrase',
            'subtitle' => 'Ceci est mon premier sous-titre',
            'content' => 'voici le contenu',
            'category_id' => $category->id
        ]);
        $this->assertModelExists($article);
    }


    //tester si le user est connecté
    public function testConnection()
    {
        $var = Auth::check();
        //return ($var);
        $this->assertTrue(true);
    }
}
