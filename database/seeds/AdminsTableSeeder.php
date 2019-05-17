<?php

use Illuminate\Database\Seeder;
use app\Models\Admins;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
           public function run()
    {
        DB::table('admins')->insert([
            'name' => Str::random(5).'Kenny',
            'email' => 'V7josy@gmail.com',
            'phonenumber'=>'0700307444',
            'password' => bcrypt('secret'),
        ]);
    }
}
