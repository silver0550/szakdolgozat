<?php

namespace Database\Factories;

use App\Enum\Tools\Display\ResolutionEnum;
use App\Enum\Tools\Display\SizeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Display>
 */
class DisplayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serial_number' => fake()->unique()->regexify('[A-Z0-9]{8}'),
            'manufacturer' => fake()->randomElement([
                'Samsung',
                'Xiaomi',
                'DELL',
            ]),
            'model_type' =>fake()->randomElement([
                'Model1', 'Model2', 'Model3'
            ]),
            'size' => fake()->randomElement(array_map(fn($enum) => $enum->value, SizeEnum::cases())),
            'resolution' => fake()->randomElement(array_map(fn($enum) => $enum->value, ResolutionEnum::cases())),
            'is_flexible' => fake()->boolean(),
            'description' => fake()->text(),
        ];
    }
}
