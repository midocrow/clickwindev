<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class linkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = array('blue', 'red', 'green');
        $i = 1;
        while ($i < 200) {
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
    }
}