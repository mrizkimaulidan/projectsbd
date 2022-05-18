<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Slider::factory(3)->create();
        $faker = Factory::create();

        for ($i = 1; $i <= 3; $i++) {
            Slider::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'image' => $i . '.jpg',
                'is_active' => 1
            ]);
        }
    }
}
