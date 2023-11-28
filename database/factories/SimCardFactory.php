<?php

namespace Database\Factories;

use App\Enum\Tools\SimCard\ProviderEnum;
use App\Enum\Tools\SimCard\SizeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SimCard>
 */
class SimCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serial_number' => fake()->unique()->regexify('[0-9]{11}'),
            'call_number' => fake()->unique()->regexify('^06(30|70|20)\d{7}$'),
            'provider' => fake()->randomElement(array_map(fn($enum) => $enum->value, ProviderEnum::cases())),
            'size' => fake()->randomElement(array_map(fn($enum) => $enum->value, SizeEnum::cases())),
            'description' => fake()->text(),
        ];
    }
}
