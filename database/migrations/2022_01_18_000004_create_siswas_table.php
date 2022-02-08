<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id("id_siswa");
            $table->char("nisn");
            $table->char("nis");
            $table->string("nama");
            $table->foreignId('id_kelas')->constrained()->references('id_kelas')->on('kelas')->nullable();
            $table->text("alamat");
            $table->string("no_telp");
            $table->foreignId('id_spp')->constrained()->references('id_spp')->on('spps')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
    public function boot()
    {
        Schema::defaultStringLength(50);
    }
}
