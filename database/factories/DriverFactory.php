<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Driver;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model\Model>
 */
class DriverFactory extends Factory
{
    protected $model = Driver::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'driver_lc' => fake()->bothify('?? ###### ??'),
            'status' => fake()->numberBetween(1,2)
        ];
    }
}
