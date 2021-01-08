<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConstituencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('constituencies')->insert([
            'name' => 'Embakasi East',    
        ]);

        DB::table('constituencies')->insert([
            'name' => 'Embakasi North',    
        ]);

        DB::table('constituencies')->insert([
            'name' => 'Embakasi South',    
        ]);

        DB::table('constituencies')->insert([
            'name' => 'Embakasi West',    
        ]);
    }
}
