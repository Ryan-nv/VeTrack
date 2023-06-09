<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Driver;
use App\Models\order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use \App\Models\User;
use App\Models\vechile;
use GuzzleHttp\Promise\Create;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@dummy.com',
            'password' => Hash::make('123456789'),
            'role' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'supervisor',
            'email' => 'supervisor@dummy.com',
            'password' => Hash::make('123456789'),
            'role' => 2
        ]);

        Driver::factory()->count(20)->create();
        vechile::factory()->count(20)->create();
        User::factory()->count(20)->create();
        $this->call([
            OrderSeeder::class
        ]);
        order::factory()->count(100)->create();
    }
}
