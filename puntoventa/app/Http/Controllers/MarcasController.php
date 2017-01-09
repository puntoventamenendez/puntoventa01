<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\pv_marca;

class MarcasController extends Controller
{
    public function index($id = null)
    {
        //
        if($id==null)
        {
            return pv_marca::orderBy('pm_id','asc')->get();
        }else{
            return $this->show($id);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombreMarcaModel' => 'required|max:100'
        ]);

        $marcas = new pv_marca();
        $marcas->pm_marca = $request->input('nombreMarcaModel');
        $marcas->save();
        
    }

    public function show($id)
    {
        return pv_marca::find($id);
    }

    public function update(Request $request, $id)
    {
        $marcas = pv_marca::find($id);
        $marcas->pm_marca = $request->input('nombreMarcaModel');
        if($marcas->save())
        {
            return $marcas->id;

        }else{
            return "ERROR";
        }
    }

    public function destroy($id)
    {
        $marcas = pv_marca::find($id)->delete();
    }
}
