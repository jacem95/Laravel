<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::get()->each(function ($category) {
            \App\Models\Article::factory(5)->create([
                'category_id' => $category->id
            ]);
        });
    }
}
