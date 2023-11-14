<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
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
//            "thumbnail"=> "images/blog-0".random_int(1,9).".jpg",
            'title' => $title,
            "slug"=> Str::slug($title),
            'body' => $this->faker->text(300),
            'category_id' => random_int(1,10),
            'tag_id' => ["Do vat","Cay coi"], //phai nam trong category_id
            'user_id'=> random_int(2,11),
            'is_approved' => 1
        ];
    }
}
