<?php

// namespace Database\Factories;

// use App\Models\Driver;
// use App\Models\order;
// use App\Models\User;
// use App\Models\vechile;
// use Illuminate\Database\Eloquent\Factories\Factory;


// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
//  */
// class orderNewFactory extends Factory
// {
//     protected $model = order::class;
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         $user = User::query()->where('role', '=', 1)->pluck('id')->toArray();
//         $driver = Driver::query()->pluck('id')->toArray();
//         $vechile = vechile::query()->pluck('id')->toArray();

//         return [
//             'date_start' => fake()->dateTimeThisMonth(),
//             'id_supervisor' => fake()->randomElement($user),
//             'id_driver' => fake()->randomElement($driver),
//             'note' => fake()->sentence(20),
//             'id_vechile' => fake()->randomElement($vechile),
//             'fuel_usage' => 0,
//             'status' => 1
//         ];
//     }
// }
