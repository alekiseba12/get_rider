<?php

use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //EMBAKASI EAST
        $embakasi_east = DB::table('constituencies')->where('name','Embakasi East')->first();

        DB::table('areas')->insert([
            'name' => 'Imara Daima', 
            'constituency_id'=>$embakasi_east->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Kobil', 
            'constituency_id'=>$embakasi_east->id     
        ]);

        DB::table('areas')->insert([
            'name' => 'Transami', 
            'constituency_id'=>$embakasi_east->id     
        ]);

        DB::table('areas')->insert([
            'name' => 'AA', 
            'constituency_id'=>$embakasi_east->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Cabanus', 
            'constituency_id'=>$embakasi_east->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Pipeline', 
            'constituency_id'=>$embakasi_east->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Stage Mpya', 
            'constituency_id'=>$embakasi_east->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Kwa Njenga', 
            'constituency_id'=>$embakasi_east->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Kwa Reuben', 
            'constituency_id'=>$embakasi_east->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'GM', 
            'constituency_id'=>$embakasi_east->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Tasia', 
            'constituency_id'=>$embakasi_east->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Fedha', 
            'constituency_id'=>$embakasi_east->id     
        ]);
        //END EMBAKASI EAST

        ////////////////////////////////////////////////////////////////////////////////////////////

        //EMBAKASI WEST
        $embakasi_west = DB::table('constituencies')->where('name','Embakasi West')->first();
        DB::table('areas')->insert([
            'name' => 'Umoja I', 
            'constituency_id'=>$embakasi_west->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Umoja II', 
            'constituency_id'=>$embakasi_west->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Umoja III', 
            'constituency_id'=>$embakasi_west->id     
        ]);

        DB::table('areas')->insert([
            'name' => 'Peacock', 
            'constituency_id'=>$embakasi_west->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Mama Lucy', 
            'constituency_id'=>$embakasi_west->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Charina', 
            'constituency_id'=>$embakasi_west->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Kwa Chief', 
            'constituency_id'=>$embakasi_west->id     
        ]);
        // EMBAKASI WEST END

        ///////////////////////////////////////////////////////////////////////////////////

        //EMBAKASI NORTH
        $embakasi_north = DB::table('constituencies')->where('name','Embakasi North')->first();
        DB::table('areas')->insert([
            'name' => 'Tena', 
            'constituency_id'=>$embakasi_north->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Market', 
            'constituency_id'=>$embakasi_north->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Inner Core', 
            'constituency_id'=>$embakasi_north->id     
        ]);
        //EMBAKASI NORTH END

        /////////////////////////////////////////////////////////////////////////////////////

        //EMBAKASI SOUTH
        $embakasi_south = DB::table('constituencies')->where('name','Embakasi South')->first();

        DB::table('areas')->insert([
            'name' => 'Donholm', 
            'constituency_id'=>$embakasi_south->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Caltex', 
            'constituency_id'=>$embakasi_south->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Hamsa', 
            'constituency_id'=>$embakasi_south->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Maringo', 
            'constituency_id'=>$embakasi_south->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Jericho', 
            'constituency_id'=>$embakasi_south->id     
        ]);
        DB::table('areas')->insert([
            'name' => 'Kwa Ndege', 
            'constituency_id'=>$embakasi_south->id     
        ]);

        //EMBAKASI SOUTH END

        //////////////////////////////////////////////////////////////////////////////////////
    }
}
