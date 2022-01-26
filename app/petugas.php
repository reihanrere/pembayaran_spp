<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    protected $table = "petugas";

    protected $fillable = [
        "id_petugas",
        "username",
        "password",
        "nama_petugas",
        "level",
    ];

    protected $primaryKey = "id_petugas";

}
