<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\spp;

class SppController extends Controller
{
    public function SppIndex() {

        $spp = spp::all();

        return view('spp.index',compact('spp'));

    }

    public function SppCreate(Request $request) {

        spp::create($request->all());

        return redirect('/spp/index');

    }

    public function SppDelete($id_spp) {

        $spp = spp::findOrFail($id_spp);
        $spp->delete();

        return redirect('/spp/index');

    }

    public function SppEdit($id_spp) {
        
        $spp = spp::findOrFail($id_spp);

        return view('spp.update',compact('spp'));

    }

    public function SppUpdate(Request $request, $id_spp) {
        
        $spp = spp::findOrFail($id_spp);
        $spp->update($request->all());
        $spp->save();

        return redirect('/spp/index');

    }
}
