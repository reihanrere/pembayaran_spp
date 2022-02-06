<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembayaran;

class PembayaranController extends Controller
{
    public function PembayaranIndex() {

        $pembayaran = pembayaran::all();

        // dd($pembayaran);
        return view('pembayaran.index',compact('pembayaran'));

    }
}
