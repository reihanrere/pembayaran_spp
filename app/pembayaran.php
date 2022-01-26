<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = "pembayarans";

    protected $fillable = [
        "id_pembayaran",
        "id_petugas",
        "nisn",
        "tgl_bayar",
        "bln_bayar",
        "thn_bayar",
        "id_spp",
        "jumlah_bayar",
    ];

    protected $primaryKey = "id_pembayaran";
}
