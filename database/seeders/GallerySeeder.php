<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Gallery::factory(20)->create();
        $faker = Factory::create();

        for ($i = 1; $i <= 12; $i++) {
            Gallery::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph(3),
                'image' => $i . '.jpg',
                'is_active' => 1
            ]);
        }
    }
}
