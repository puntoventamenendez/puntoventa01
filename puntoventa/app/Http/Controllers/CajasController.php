<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\pv_caja;

class CajasController extends Controller
{
    public function index($id = null)
    {
        //
        if($id==null)
        {
            return pv_caja::orderBy('pca_id','asc')->get();
        }else{
            return $this->show($id);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombreCajaModel' => 'required|max:100'
        ]);

        $caja = new pv_caja();
        $caja->pca_caja = $request->input('nombreCajaModel');
        $caja->save();
        
    }

    public function show($id)
    {
        return pv_caja::find($id);
    }

    public function update(Request $request, $id)
    {
        $caja = pv_caja::find($id);
        $caja->pca_caja = $request->input('nombreCajaModel');
        if($caja->save())
        {
            return $caja->id;

        }else{
            return "ERROR";
        }
    }

    public function destroy($id)
    {
        $caja = pv_caja::find($id)->delete();
    }
}
