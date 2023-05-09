<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phone>
 */
class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'IMEI' => fake()->unique()->numberBetween(100000000000000,999999999999999),
            'manufacturer' => fake()->randomElement([
                    'Samsung',
                    'Huawei',
                    'LG',
                ]),
            'model_type' =>fake()->randomElement([
                 'Model1', 'Model2', 'Model3'   
                ])
        ];
    }
}
