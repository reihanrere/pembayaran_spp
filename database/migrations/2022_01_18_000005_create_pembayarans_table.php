<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id("id_pembayaran");
            $table->foreignId('id_petugas')->constrained()->references('id_petugas')->on('petugas')->nullable();
            $table->foreignId('id_siswa')->constrained()->references('id_siswa')->on('siswas')->nullable();
            $table->string("tgl_bayar");
            $table->string("bln_bayar");
            $table->string("thn_bayar");
            $table->foreignId('id_spp')->constrained()->references('id_spp')->on('spps')->nullable();
            $table->integer("jumlah_bayar");
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
        Schema::dropIfExists('pembayarans');
    }
    public function boot()
    {
        Schema::defaultStringLength(50);
    }
}
