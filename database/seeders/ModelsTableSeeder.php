<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('car_models')->delete();

        $faker = Faker::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        $models = [];

        for ($i = 1; $i <= 30; $i++) {
            $models[] = [
                'name' => $faker->vehicleModel,
            ];
        }

        DB::table('car_models')->insert($models);
    }
}
