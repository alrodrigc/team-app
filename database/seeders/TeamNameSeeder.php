<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Faker\Factory;
use App\Models\TeamName;

class TeamNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // TeamName::truncate();
        for ($i = 0; $i < 10; $i++)
        {
            $faker = Factory::create();
            TeamName::create([
                'name' => $faker->unique()->company,
                'description' => $faker
                -> optional($weight = 0.8)
                -> paragraph($nbSentences = 3,
                             $variableNbSentences = true,
                             $asText = true),
                'user_id' => $faker->numberBetween($min = 1, $max = 5)
            ]);
        }
    }
}
