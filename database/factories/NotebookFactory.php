<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notebook>
 */
class NotebookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'serial_number' =>fake()->unique()->regexify('[A-Z0-9]{10}'),
            'manufactuter' => fake()->randomElement([
                'Asus',
                'HP',
                'DELL',
            ]),
            'model_type' =>fake()->randomElement([
                'Model1', 'Model2', 'Model3'   
               ])

        ];
    }
}
