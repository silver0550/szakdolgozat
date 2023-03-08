<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Enums\DepartmentEnum;
use App\Enums\AssignmentEnum;


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
            'birth_of_date' => fake()->date(),
            'department' => fake()->randomElement([
                DepartmentEnum::DEVELOPMENT,
                DepartmentEnum::MARCETING,
                DepartmentEnum::PRODUCTION,
                DepartmentEnum::SALES
            ]),
            'assignment' => fake()->randomElement([
                AssignmentEnum::LEADER,
                AssignmentEnum::SUBORDINATE
            ]),
            
        ];
    }
}
