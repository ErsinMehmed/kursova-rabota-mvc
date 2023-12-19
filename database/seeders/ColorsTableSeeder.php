<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colors')->delete();

        $faker = Faker::create();
        $colors = [];

        for ($i = 1; $i <= 30; $i++) {
            $colors[] = [
                'name' => $faker->colorName,
            ];
        }

        DB::table('colors')->insert($colors);
    }
}
