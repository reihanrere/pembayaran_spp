<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "admin",
            'role' => "admin",
            'email' => "admin@admin.com",
            'password' => Hash::make('admin'),
        ]);

        DB::table('users')->insert([
            'name' => "petugas",
            'role' => "petugas",
            'email' => "petugas@petugas.com",
            'password' => Hash::make('petugas'),
        ]);

        DB::table('users')->insert([
            'name' => "siswa",
            'role' => "siswa",
            'email' => "siswa@siswa.com",
            'password' => Hash::make('siswa'),
        ]);
    }
}
