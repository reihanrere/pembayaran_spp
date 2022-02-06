<?php

use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10 ; $i++) { 
            DB::table('siswas')->insert([
                'nisn' => 12345678 + $i,
                'nis' => 12345678 + $i,
                'nama' => 'ujang',
                'id_kelas' => 1 + $i,
                'alamat' => 'depok',
                'no_telp' => '089123456',
                'id_spp' => 1 + $i,
            ]);
        }
    }
}
