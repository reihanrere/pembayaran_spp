<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\siswa;

class SiswaController extends Controller
{
    public function SiswaIndex() {

        $siswa = siswa::all();
        $kelas = \App\kelas::all();
        // dd($siswa);
        return view("siswa.index",compact("siswa","kelas"));

    }

    public function SiswaCreate(Request $request) {
        $request->validate([
            'nisn' => 'required|numeric|min:5|unique:siswas',
            'nis' => 'required|numeric|min:5|unique:siswas',
            'nama' => 'required|min:2|max:30',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
        ]);

        siswa::create($request->all());

        return redirect('/siswa/index');
    }

    public function SiswaDelete($id_siswa) {

        $siswa = siswa::findOrFail($id_siswa);
        $siswa->delete();

        return redirect('/siswa/index');
    }

    public function SiswaEdit($id_siswa) {

        $siswa = siswa::findOrFail($id_siswa);

        return view('siswa.update',compact('siswa'));

    }

    public function SiswaUpdate(Request $request, $id_siswa) {

        $request->validate([
            'nama' => 'required|min:2|max:30',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
        ]);

        $siswa = siswa::findOrFail($id_siswa);
        $siswa->update($request->all());
        $siswa->save();

        return redirect('/siswa/index');

    }
}
