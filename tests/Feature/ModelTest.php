<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotEmpty;

class ModelTest extends TestCase
{
    use RefreshDatabase;

    //Dans premier temps on vérifie si la personne 
    //arrive à s'inscrire si elle remplit toutes les infos





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
        $user = User::create([
            'email' => 'admin@admin.com',
            'name' => 'adminbbbb',
            'password' => Hash::make('toor'),
            'role' => User::ADMIN_ROLE
        ]);

        $this->assertModelExists($user);
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
}
