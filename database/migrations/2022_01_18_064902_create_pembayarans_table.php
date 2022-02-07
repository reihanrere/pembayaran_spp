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
            $table->integer("id_petugas")->nullable();
            $table->string("id_siswa")->nullable();
            $table->string("tgl_bayar");
            $table->string("bln_bayar");
            $table->string("thn_bayar");
            $table->integer("id_spp")->nullable();
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
}
