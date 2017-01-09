<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\pv_unidad;

class UnidadesController extends Controller
{
    public function index($id = null)
    {
        //
        if($id==null)
        {
            return pv_unidad::orderBy('pu_id','asc')->get();
        }else{
            return $this->show($id);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombreUnidadModel' => 'required|max:100'
        ]);

        $unidad = new pv_unidad();
        $unidad->pu_unidad = $request->input('nombreUnidadModel');
        $unidad->save();
        
    }

    public function show($id)
    {
        return pv_unidad::find($id);
    }

    public function update(Request $request, $id)
    {
        $unidad = pv_unidad::find($id);
        $unidad->pu_unidad = $request->input('nombreUnidadModel');
        if($unidad->save())
        {
            return $unidad->id;

        }else{
            return "ERROR";
        }
    }

    public function destroy($id)
    {
        $unidad = pv_unidad::find($id)->delete();
    }
}
