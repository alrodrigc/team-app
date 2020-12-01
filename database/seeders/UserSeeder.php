<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        $password = Hash::make('12345678');
        $faker = Factory::create();

        for ($i = 0; $i < 5; $i ++)
        {
            User::create([
                'name' => $faker->unique()->userName,
                'email' => $faker->unique()->safeEmail,
                'password' => $password
            ]);
        }
    }
}
