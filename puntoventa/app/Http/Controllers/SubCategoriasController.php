<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\pv_subcategoria;
use App\pv_categoria;

class SubCategoriasController extends Controller
{
    public function setCategoria()
    {
        return pv_categoria::all();
    }

    public function index($id = null)
    {
        if($id==null)
        {
            //return pv_subcategoria::orderBy('ps_id','asc')->get();
            return BD::table('pv_subcategoria')
            ->join('pv_categoria', 'pv_subcategoria.ps_id', '=', 'pv_categoria.pc_id')
            ->select('pv_subcategoria.*', 'pv_categoria.pc_categoria')
            ->get();

        }else{
            return $this->show($id);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombreSubCategoriaModel' => 'required|max:100'
        ]);

        $subcategoria = new pv_subcategoria();
        $subcategoria->ps_subcategoria      = $request->input('nombreSubCategoriaModel');
        $subcategoria->pv_categoria_pc_id   = $request->input('selectCategoriaModel');
        $subcategoria->save();
        
    }

    public function show($id)
    {
        return pv_subcategoria::find($id);
    }

    public function update(Request $request, $id)
    {
        $subcategoria = pv_subcategoria::find($id);
        $subcategoria->ps_subcategoria      = $request->input('nombreSubCategoriaModel');
        $subcategoria->pv_categoria_pc_id   = $request->input('selectCategoriaModel');
        if($subcategoria->save())
        {
            return $subcategoria->id;

        }else{
            return "ERROR";
        }
    }

    public function destroy($id)
    {
        $subcategoria = pv_subcategoria::find($id)->delete();
    }
}
