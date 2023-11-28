<?php

namespace Database\Factories;

use App\Enum\Tools\Printer\TypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Printer>
 */
class PrinterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serial_number' => fake()->unique()->regexify('[A-Z0-9]{7}'),
            'manufacturer' => fake()->randomElement([
                'Epson',
                'Canon',
                'Hp',
            ]),
            'model_type' =>fake()->randomElement([
                'Model1', 'Model2', 'Model3'
            ]),
            'is_colorful' =>fake()->boolean(),
            'type' => fake()->randomElement(array_map(fn($enum) => $enum->value, TypeEnum::cases())),
            'description' => fake()->randomElement([null, fake()->text()]),
        ];
    }
}
