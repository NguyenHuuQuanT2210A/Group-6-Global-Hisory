<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->name;
        return [
            "thumbnail"=> "images/events/".random_int(10,15).".jpg",
            'name' => $name,
            "slug"=> Str::slug($name),
            'date_from' => $this->faker->dateTimeBetween('-5 years','-1 months'),
            'date_to' => $this->faker->dateTimeBetween('-5 years','now'),
            'qty' => random_int(1,5),
            'address' => $this->faker->address(),
            'description' => $this->faker->text(200),
            'category_id' => random_int(1,10),
            'tag_id' => random_int(1,10), //phai nam trong category_id
        ];
    }
}
