<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->delete();

        $faker = Faker::create();

        $countries = [];

        for ($i = 1; $i <= 30; $i++) {
            $countries[] = [
                'name' => $faker->country,
            ];
        }

        DB::table('countries')->insert($countries);
    }
}
