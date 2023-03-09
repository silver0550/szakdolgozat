<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Enum\Department;

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
    public function definition()
    {
        $user = User::factory()->create();
        return [
            'user_id' => $user->id,
            'place_of_birth' =>fake()->city(),
            'date_of_birth' => fake()->date(),
            'department' => fake()->randomElement([
                Department::DEVELOPMENT,
                Department::MARKETING,
                Department::PRODUCTION,
                Department::SALES
            ]),
            'isleader' => fake()->boolean(),
            'entry_card' => fake()->unique()->numberBetween(100000,999999),
        ];
    }
}
