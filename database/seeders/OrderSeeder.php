<?php

namespace Database\Seeders;


use App\Models\Driver;
use App\Models\order;
use App\Models\User;
use App\Models\vechile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->where('role', '=', 1)->pluck('id')->toArray();
        $driver = Driver::query()->pluck('id')->toArray();
        $vechile = vechile::query()->pluck('id')->toArray();

        order::create([
            'date_start' => fake()->dateTimeThisMonth(),
            'id_supervisor' => fake()->randomElement($user),
            'id_driver' => fake()->randomElement($driver),
            'note' => fake()->sentence(20),
            'id_vechile' => fake()->randomElement($vechile),
            'fuel_usage' => 0,
            'status' => 1
        ]);

        order::create([
            'date_start' => fake()->dateTimeThisMonth(),
            'id_supervisor' => fake()->randomElement($user),
            'id_driver' => fake()->randomElement($driver),
            'note' => fake()->sentence(20),
            'id_vechile' => fake()->randomElement($vechile),
            'fuel_usage' => 0,
            'status' => 1
        ]);

        order::create([
            'date_start' => fake()->dateTimeThisMonth(),
            'id_supervisor' => fake()->randomElement($user),
            'id_driver' => fake()->randomElement($driver),
            'note' => fake()->sentence(20),
            'id_vechile' => fake()->randomElement($vechile),
            'fuel_usage' => 0,
            'status' => 1
        ]);

        order::create([
            'date_start' => fake()->dateTimeThisMonth(),
            'id_supervisor' => fake()->randomElement($user),
            'id_driver' => fake()->randomElement($driver),
            'note' => fake()->sentence(20),
            'id_vechile' => fake()->randomElement($vechile),
            'fuel_usage' => 0,
            'status' => 1
        ]);

        order::create([
            'date_start' => fake()->dateTimeThisMonth(),
            'id_supervisor' => fake()->randomElement($user),
            'id_driver' => fake()->randomElement($driver),
            'note' => fake()->sentence(20),
            'id_vechile' => fake()->randomElement($vechile),
            'fuel_usage' => 0,
            'status' => 1
        ]);

        order::create([
            'date_start' => fake()->dateTimeThisMonth(),
            'id_supervisor' => fake()->randomElement($user),
            'id_driver' => fake()->randomElement($driver),
            'note' => fake()->sentence(20),
            'id_vechile' => fake()->randomElement($vechile),
            'fuel_usage' => 0,
            'status' => 1
        ]);

        order::create([
            'date_start' => fake()->dateTimeThisMonth(),
            'id_supervisor' => fake()->randomElement($user),
            'id_driver' => fake()->randomElement($driver),
            'note' => fake()->sentence(20),
            'id_vechile' => fake()->randomElement($vechile),
            'fuel_usage' => 0,
            'status' => 1
        ]);

        order::create([
            'date_start' => fake()->dateTimeThisMonth(),
            'id_supervisor' => fake()->randomElement($user),
            'id_driver' => fake()->randomElement($driver),
            'note' => fake()->sentence(20),
            'id_vechile' => fake()->randomElement($vechile),
            'fuel_usage' => 0,
            'status' => 1
        ]);
    }
}
