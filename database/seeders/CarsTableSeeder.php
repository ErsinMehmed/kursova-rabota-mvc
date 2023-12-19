<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->delete();

        $faker = Faker::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        $cars = [];

        for ($i = 1; $i <= 10; $i++) {
            $cars[] = [
                'brand_id' => rand(1, 30),
                'model_id' => rand(1, 30),
                'year' => $faker->date(),
                'country_id' => rand(1, 30),
                'fuel_type' =>  $faker->vehicleFuelType,
                'door_count' =>  $faker->vehicleDoorCount,
                'price' => $faker->randomFloat(2, 10000, 50000),
                'color_id' => rand(1, 30),
                'description' => $faker->text,
                'user_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('cars')->insert($cars);
    }
}
