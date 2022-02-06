<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = "pembayarans";

    protected $fillable = [
        "id_pembayaran",
        "id_petugas",
        "id_siswa",
        "tgl_bayar",
        "bln_bayar",
        "thn_bayar",
        "id_spp",
        "jumlah_bayar",
    ];

    protected $primaryKey = "id_pembayaran";

    public function petugas() {
        return $this->belongsTo('App\petugas','id_petugas');
    }

    public function siswa() {
        return $this->belongsTo('App\siswa','id_siswa');
    }
}
