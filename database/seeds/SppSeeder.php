<?php

use Illuminate\Database\Seeder;

class SppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 5; $i++) {
            DB::table('spps')->insert([
                'tahun' => 2022 + $i,
                'nominal' => 200000 + $i,  
            ]);
        }
    }
}
