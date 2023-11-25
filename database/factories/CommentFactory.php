<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
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
    public function definition(): array
    {
        return [
            'user_id' =>User::get()->random()->id,
            'post_id' => Post::get()->random()->id,
            "parent_id" =>  $this->faker->randomElement([0, random_int(1, 50)]),
            'comment' => $this->faker->paragraph(1)
        ];
    }
}
