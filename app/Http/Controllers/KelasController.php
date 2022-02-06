<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Kelas;

class KelasController extends Controller
{
    public function KelasIndex() {

        $kelas = kelas::all();

        // return response()->json([ 'code' => "00", 'message' => 'success', 'data' => $kelas ]);

        return view('kelas.index',compact('kelas'));

    }

    public function KelasCreate(Request $request) {

        kelas::create($request->all());

        return redirect('/kelas/index');

    }

    public function KelasEdit($id_kelas) {

        $kelas = kelas::findOrFail($id_kelas);

        return view('kelas.update',compact('kelas'));

    }

    public function KelasUpdate(Request $request, $id_kelas) {

        $kelas = kelas::findOrFail($id_kelas);
        $kelas->update($request->all());
        $kelas->save();

        return redirect('/kelas/index');

    }

    public function KelasDelete($id_kelas) {

        $siswa = siswa::findOrFail($id_kelas);
        $siswa->delete();

        return redirect('/kelas/index');

    }
}
