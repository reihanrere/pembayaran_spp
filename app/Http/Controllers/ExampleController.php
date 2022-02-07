<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function ExIndex(Request $request) {


        if ($request->has('keyword'))
        {
            $data = \App\kelas::where('nama_kelas', 'LIKE', '%' . $request['keyword'] . '%')->get();
        } else 
        {
            $data = \App\kelas::all();
        }

        return response()->json([ 'code' => "00", 'message' => 'success', 'data' => $data ]);
        // return response()->json($data);
    }

    public function ExDelete($id_kelas) {
        $data = \App\Kelas::findOrFail($id_kelas);
        $data->delete();

        return response()->json([ 'code' => "00", 'message' => 'success', 'data' => $id_kelas ]);
    }

    public function ExCreate(Request $request) {

        $this->validate($request,[
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        if(empty($request['id_kelas']))
            \App\kelas::create($request->all());
        else{
            $kelas = \App\kelas::findOrFail($request['id_kelas']);
            $kelas->update($request->all());
            $kelas->save();
        }    

        return response()->json([ 'code' => "00", 'message' => 'success']);

    }

    public function ExEdit($id_kelas) {

        $data = \App\kelas::findOrFail($id_kelas);

        return response()->json([ 'code' => "00", 'message' => 'success', 'data' => $data ]);

    }

    public function ExUpdate(Request $request, $id_kelas) {

        $data = \App\kelas::findOrFail($id_kelas);
        $data->update();
        $data->save();

        return response()->json([ 'code' => "00", 'message' => 'success']);

    }
}
