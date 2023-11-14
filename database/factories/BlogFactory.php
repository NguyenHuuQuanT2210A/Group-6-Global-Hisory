<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->jobTitle;
        return [
            "thumbnail"=> "images/footer-".random_int(0,7).".jpg",
            'title' => $title,
            "slug"=> Str::slug($title),
            'body' => $this->faker->text(5000),
            'category_id' => random_int(1,10),
            'tag_id' => random_int(1,10), //phai nam trong category_id
            'user_id'=> random_int(2,11),
        ];
    }
}
