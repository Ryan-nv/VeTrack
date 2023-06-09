<?php

namespace Database\Factories;

use App\Models\vechile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\vechile>
 */
class vechileFactory extends Factory
{
    protected $model = vechile::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->regexify('[A-Z]{3} [0-9]{5}'),
            'type' => fake()->numberBetween(1,4),
            'license_num' => fake()->bothify('?? ##### ??'),
            'service_date' => fake()->dateTimeThisMonth(),
            'usage' => fake()->randomNumber(),
            'status' => fake()->numberBetween(1,4),
        ];
    }
}
