<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\siswa;

class SiswaController extends Controller
{
    public function SiswaIndex() {

        $siswa = siswa::all();

        return view("siswa.index",compact("siswa"));

    }

    public function SiswaCreate(Request $request) {
        siswa::create($request->all());

        return redirect('/siswa/index');
    }

    public function SiswaDelete($id_siswa) {

        $siswa = siswa::findOrFail($id_siswa);
        dd($siswa);
        // $siswa->delete();

        // return redirect('/siswa/index');
    }
}
