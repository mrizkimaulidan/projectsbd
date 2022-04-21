<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'article_id' => mt_rand(1, 20),
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'body' => $this->faker->text,
            'is_verified' => 0,
            'verified_by' => null,
            'date' => now()
        ];
    }
}
