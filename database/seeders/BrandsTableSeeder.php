<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->delete();

        $faker = Faker::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        $brands = [];

        for ($i = 1; $i <= 30; $i++) {
            $brands[] = [
                'name' => $faker->vehicleBrand,
            ];
        }

        DB::table('brands')->insert($brands);
    }
}
