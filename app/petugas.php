<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    protected $table = "petugas";

    protected $fillable = [
        "id_petugas",
        "username",
        "email",
        "password",
        "nama_petugas",
        "level",
    ];

    protected $primaryKey = "id_petugas";

    public function pembayaran() {
        return $this->hasMany('App\pembayaran','id_petugas');
    }

}
