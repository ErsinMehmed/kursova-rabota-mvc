<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();

        $faker = Faker::create();

        $users = [];
        $roles = ['admin', 'buyer', 'seller'];

        for ($i = 1; $i <= 10; $i++) {
            $email = $faker->unique()->safeEmail;

            $users[] = [
                'name' => $faker->name,
                'email' => $email,
                'email_verified_at' => now(),
                'password' => Hash::make($email),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => $faker->randomElement($roles),
            ];
        }

        DB::table('users')->insert($users);
    }
}
