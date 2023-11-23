<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mail>
 */
class MailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name;
        return [
            'name' => $name,
            "slug"=> Str::slug($name),
            'email' => $this->faker->email,
            'tel' => $this->faker->phoneNumber,
            'message' => $this->faker->text(),
            'user_id'=> random_int(2,11),
        ];
    }
}
