<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\pv_categoria;

class CategoriasController extends Controller
{
    public function index($id = null)
    {
        //
        if($id==null)
        {
            return pv_categoria::orderBy('pc_id','asc')->get();
        }else{
            return $this->show($id);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombreCategoriaModel' => 'required|max:100'
        ]);

        $categoria = new pv_categoria();
        $categoria->pc_categoria = $request->input('nombreCategoriaModel');
        $categoria->save();
        
    }

    public function show($id)
    {
        return pv_categoria::find($id);
    }

    public function update(Request $request, $id)
    {
        $categoria = pv_categoria::find($id);
        $categoria->pc_categoria = $request->input('nombreCategoriaModel');
        if($categoria->save())
        {
            return $categoria->id;

        }else{
            return "ERROR";
        }
    }

    public function destroy($id)
    {
        $categoria = pv_categoria::find($id)->delete();
    }
}
