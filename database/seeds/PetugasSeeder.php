<?php

use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petugas')->insert([
            'username' => "petugas",
            'password' => Hash::make('petugas'),
            'email' => "petugas@petugas.com",
            'nama_petugas' => "petugas",
            'level' => "petugas",
        ]);

        DB::table('petugas')->insert([
            'username' => "admin",
            'password' => Hash::make('admin'),
            'email' => "admin@admin.com",
            'nama_petugas' => "admin",
            'level' => "admin",
        ]);
    }
}
