<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'slug' => $this->faker->slug,
            'title' => $this->faker->sentence(10),
            'body' => $this->faker->text,
            'thumbnail' => 'https://picsum.photos/600/300',
            'is_active' => mt_rand(0, 1),
            'views' => mt_rand(100, 500),
            'published_at' => now()
        ];
    }
}
