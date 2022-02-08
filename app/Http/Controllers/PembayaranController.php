<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembayaran;

class PembayaranController extends Controller
{
    public function PembayaranIndex() {

        $pembayaran = pembayaran::all();
        $petugas = \App\petugas::all();
        $siswa = \App\siswa::all();
        $spp = \App\spp::all();

        // dd($pembayaran);
        return view('pembayaran.index',compact('pembayaran','petugas','siswa','spp'));

    }

    public function PembayaranIndex2(Request $request) {

        if ($request->has('search-input'))
        {
            $data = array();
            $data['pembayaran'] = pembayaran::with(['siswa' => function ($query){ 
                                                                $request->has('search-input');
                                                                $query->where('nama', 'LIKE', '%' . $request['search-input'] . '%'); 
                                                            }])->get();
        } else 
        {
            $data = array();
            $data['pembayaran'] = pembayaran::with('petugas','siswa')->get();
        }

        // dd($pembayaran);
        return response()->json([ 'code' => "00", 'message' => 'success', 'data' => $data]);

    }

    public function PembayaranCreate(Request $request) {
        pembayaran::create($request->all());

        return redirect('/pembayaran/index');
    }

    public function PembayaranDelete($id) {
        $pembayaran = pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect('/pembayaran/index');
    }

    public function PembayaranEdit($id) {
        $pembayaran = pembayaran::findOrfail($id);
        $siswa = \App\siswa::all();
        $petugas = \App\petugas::all();
        $spp = \App\spp::all();

        return view('pembayaran.update',compact('pembayaran','siswa','petugas','spp'));
    }

    public function PembayaranUpdate(Request $request, $id){
        $pembayaran = pembayaran::findOrFail($id);
        $pembayaran->update($request->all());
        $pembayaran->save();

        return redirect('/pembayaran/index');
    }
}
