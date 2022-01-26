<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spp extends Model
{
    protected $table = "spps";

    protected $fillable = [
        "id_spp",
        "tahun",
        "nominal",
    ]; 

    protected $primaryKey = "id_spp";
}
