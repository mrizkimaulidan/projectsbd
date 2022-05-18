<?php

namespace Database\Seeders;

use App\Models\Comment;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Comment::factory(30)->create();
        $faker = Factory::create('id_ID');

        $isVerified = mt_rand(0, 1);

        for ($i = 1; $i <= 30; $i++) {
            Comment::create([
                'article_id' => mt_rand(1, 6),
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'body' => $faker->paragraph(2),
                'is_verified' => $isVerified,
                'verified_by' => $isVerified === 1 ? 1 : null,
            ]);
        }
    }
}
