<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkStation>
 */
class WorkStationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serial_number' => fake()->unique()->regexify('[0-9]{12}'),
            'manufacturer' => fake()->randomElement([
                'Apple', 'Samsung', 'Dell',
            ]),
            'model_type' => fake()->randomElement([
                'Model1', 'Model2', 'Model3'
            ]),
            'description' => fake()->randomElement([null, fake()->text()]),
        ];
    }
}
