<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Faker\Generator;

class linkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('points')->truncate();
        DB::table('links')->truncate();
        $records_count = 10000;
        $faker = Faker::create();


        $i = 1;
        while ($i <= $records_count) {
            DB::table('users')->insert([
                'id' => $i,
                'name' => $faker->userName,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'updated_at' => now(),
                'created_at' => now(),
            ]);
            $i = $i + 1;
        }

        $a = array('blue', 'red', 'green');
        $i = 1;
        while ($i <= $records_count) {
            DB::table('links')->insert([
                'zone' => $a[rand(0, 2)],
                'link' => 'https://twitter.com/status/' . Str::random(10),
                'code' => 'click.' . rand(100000, 999999) . '.win',
                'user_id' => $i,
                'updated_at' => now(),
                'created_at' => now()
            ]);
            $i = $i + 1;
        }

        $i = 1;
        while ($i <= $records_count) {
            DB::table('points')->insert([
                'user_id' => $i,
                'points' => rand(0, 500),
                'position_red' => 0,
                'position_blue' => 0,
                'position_green' => 0,
                'position_gold' => 0
            ]);
            $i = $i + 1;
        }
    }
}