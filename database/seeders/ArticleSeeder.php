<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 6; $i++) {
            Article::create([
                'user_id' => 1,
                'title' => $faker->sentence(8),
                'slug' => $faker->slug,
                'body' => $faker->paragraph(3),
                'thumbnail' => $i . '.jpg',
                'is_active' => 1,
                'views' => mt_rand(100, 500)
            ]);
        }
    }
}
