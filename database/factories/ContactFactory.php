<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "phone" => fake()->unique()->tollFreePhoneNumber(),
            "email" => fake()->unique()->safeEmail(),
            "reason_contact" => fake()->numberBetween(1, 3),
            "message" => fake()->text(200)
        ];
    }
}
