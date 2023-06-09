<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\order;
use App\Models\User;
use App\Models\vechile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\order>
 */
class orderFactory extends Factory
{
    protected $model = order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::query()->where('role', '=', 2)->pluck('id')->toArray();
        $driver = Driver::query()->pluck('id')->toArray();
        $vechile = vechile::query()->pluck('id')->toArray();

        $date_end = fake()->dateTimeThisMonth();
        $fuel_usage = fake()->numberBetween(1, 300);
        $status = fake()->numberBetween(1,5);

        if($status == 1)
        {
            $date_end = null;
            $fuel_usage = 0;
        }

        return [
            'date_start' => fake()->dateTimeThisMonth(),
            'date_end' => $date_end,
            'id_supervisor' => fake()->randomElement($user),
            'id_driver' => fake()->randomElement($driver),
            'note' => fake()->sentence(20),
            'id_vechile' => fake()->randomElement($vechile),
            'fuel_usage' => $fuel_usage,
            'status' => $status
        ];
    }
}
