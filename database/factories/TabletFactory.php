<?php

namespace Database\Factories;

use App\Enum\ColorEnum;
use App\Enum\Tools\Tablet\DisplaySizeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tablet>
 */
class TabletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serial_number' => fake()->unique()->regexify('[A-Z0-9]{9}'),
            'manufacturer' => fake()->randomElement([
                'Apple', 'Samsung', 'Xiaomi',
            ]),
            'model_type' => fake()->randomElement([
                'Model1', 'Model2', 'Model3'
            ]),
            'display_size' => fake()->randomElement(array_map(fn($enum) => $enum->value, DisplaySizeEnum::cases())),
            'color' => fake()->randomElement(array_map(fn($enum) => $enum->value, ColorEnum::cases())),
            'description' => fake()->randomElement([null, fake()->text()]),
        ];
    }
}
