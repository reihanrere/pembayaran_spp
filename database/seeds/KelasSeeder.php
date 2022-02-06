<?php

use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            'nama_kelas' => 'X-A',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);

        DB::table('kelas')->insert([
            'nama_kelas' => 'X-B',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);
        
        DB::table('kelas')->insert([
            'nama_kelas' => 'X-C',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);

        DB::table('kelas')->insert([
            'nama_kelas' => 'XI-A',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);

        DB::table('kelas')->insert([
            'nama_kelas' => 'XI-B',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);

        DB::table('kelas')->insert([
            'nama_kelas' => 'XII-A',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);

        DB::table('kelas')->insert([
            'nama_kelas' => 'XII-B',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);
    }
}
