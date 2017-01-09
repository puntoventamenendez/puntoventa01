<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\pv_bodega;

class BodegasController extends Controller
{
    public function index($id = null)
    {
        //
        if($id==null)
        {
            return pv_bodega::orderBy('pb_id','asc')->get();
        }else{
            return $this->show($id);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombreBodegaModel' => 'required|max:100'
        ]);

        $bodega = new pv_bodega();
        $bodega->pb_bodega = $request->input('nombreBodegaModel');
        $bodega->save();
        
    }

    public function show($id)
    {
        return pv_bodega::find($id);
    }

    public function update(Request $request, $id)
    {
        $bodega = pv_bodega::find($id);
        $bodega->pb_bodega = $request->input('nombreBodegaModel');
        if($bodega->save())
        {
            return $bodega->id;

        }else{
            return "ERROR";
        }
    }

    public function destroy($id)
    {
        $bodega = pv_bodega::find($id)->delete();
    }
}
