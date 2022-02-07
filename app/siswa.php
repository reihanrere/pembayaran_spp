<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = "siswas";

    protected $fillable = [
        "id_siswa",
        "nisn",
        "nis",
        "nama",
        "id_kelas",
        "alamat",
        "no_telp",
        "id_spp",
    ];

    protected $primaryKey = "id_siswa";

    public function pembayaran() {
        return $this->hasMany('App\pembayaran','id_siswa');
    }
}
