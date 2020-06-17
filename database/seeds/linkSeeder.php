<?php

use Illuminate\Database\Seeder;

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
        while ($i < 102) {
            DB::table('links')->insert([
                'zone' => $a[rand(0, 2)],
                'link' => 'https://twitter.com/status/' . Str::random(10),
                'code' => 'click.' . rand(100000, 999999) . '.win',
                'user_id' => $i,
                'updated_at' => '2020-05-18 02:21:30',
                'created_at' => '2020-05-18 02:21:30'
            ]);
            $i = $i + 1;
        }
    }
}