<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\petugas;
use App\User;
use Illuminate\Support\Str;

class PetugasController extends Controller
{
    public function PetugasIndex()
    {
        
        $petugas = petugas::all();

        return view('petugas.index',compact('petugas'));

    }

    public function PetugasCreate(Request $request) {

        // insert ke table user
        $user = new \App\User;
        $user->role = $request->level;
        $user->name = $request->nama_petugas;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        $petugas = new petugas;
        $petugas->level = $request->level;
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->email = $request->email;
        $petugas->username = $request->username;
        $petugas->password = bcrypt($request->password);
        $petugas->save();

        return redirect('/petugas/index');

    }

    public function PetugasEdit($id_petugas){

        $petugas = petugas::findOrFail($id_petugas);

        return view('petugas.update',compact('petugas'));

    }
}
