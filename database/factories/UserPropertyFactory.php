<?php

namespace Database\Factories;

use App\Enum\DepartmentEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProperty>
 */
class UserPropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'place_of_birth' =>fake()->city(),
            'date_of_birth' => fake()->date(),
            'department' => fake()->randomElement(DepartmentEnum::cases()),
            'entry_card' => fake()->unique()->numberBetween(100000,999999),
        ];
    }
}
