<?php

use Illuminate\Database\Seeder;
use App\Models\Categories;

class categoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'name' => 'weddings',
            'slug'=>'weddings',
            'status'=>'1',
        ]);
        DB::table('categories')->insert([
            'name' => 'outdoors',
            'slug'=>'outdoors',
            'status'=>'1',
        ]);
        DB::table('categories')->insert([
            'name' => 'events',
            'slug'=>'events',
            'status'=>'1',
        ]);
    }
}
