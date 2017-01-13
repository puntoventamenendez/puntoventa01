<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\pv_producto;
use App\pv_categoria;
use App\pv_subcategoria;
use App\pv_marca;
use App\pv_unidad;
use App\pv_producto_vista;
use App\pv_bodega;
use App\pv_inventario;
use App\pv_bodega_producto_vista;

class ProductosController extends Controller
{

    public function index($id = null)
    {
        if($id==null)
        {
            $datosFormProductos = array();
            array_push($datosFormProductos,pv_categoria::all());
            array_push($datosFormProductos,pv_subcategoria::all());
            array_push($datosFormProductos,pv_marca::all());
            array_push($datosFormProductos,pv_unidad::all());
            array_push($datosFormProductos,pv_producto_vista::all());
            return $datosFormProductos;
        }else{
            return $this->show($id);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombreProductoModel' => 'required|max:100'
        ]);

        $producto = new pv_producto();
        $producto->pp_estado            = $request->input('selectEstadoModel');
        $producto->pv_unidad_pu_id      = $request->input('selectUnidadModel');
        $producto->pv_marca_pm_id       = $request->input('selectMarcaModel');
        $producto->pv_categoria_pc_id   = $request->input('selectCategoriaModel');
        $producto->pv_subcategoria_ps_id= $request->input('selectSubCategoriaModel');
        $producto->pp_barcod            = $request->input('codBarraModel');
        $producto->pp_producto          = $request->input('nombreProductoModel');
        $producto->pp_valor             = $request->input('inputValorModel');
        $producto->pp_valor_mayorista   = $request->input('inputValorMayoristaModel');
        if($producto->save()){
            return $producto->pp_id;
        }
        
    }

    public function show($id)
    {
        return pv_producto::find($id);
    }

    public function update(Request $request, $id)
    {
        $producto = pv_producto::find($id);
        $producto->pp_estado            = $request->input('selectEstadoModel');
        $producto->pv_unidad_pu_id      = $request->input('selectUnidadModel');
        $producto->pv_marca_pm_id       = $request->input('selectMarcaModel');
        $producto->pv_categoria_pc_id   = $request->input('selectCategoriaModel');
        $producto->pv_subcategoria_ps_id= $request->input('selectSubCategoriaModel');
        $producto->pp_barcod            = $request->input('codBarraModel');
        $producto->pp_producto          = $request->input('nombreProductoModel');
        $producto->pp_valor             = $request->input('inputValorModel');
        $producto->pp_valor_mayorista   = $request->input('inputValorMayoristaModel');

        if($producto->save())
        {
            return $producto->id;

        }else{
            return "ERROR";
        }
    }

    public function updateStock(Request $request,$id)
    {
        if($id == null)
        {
            $inventario                         = pv_inventario::find($id);
            dd($invetario);
            return false;
            $inventario->pv_bodega_pb_id        = $request->input('bodegaIdModel');
            $inventario->pbp_cantidad           = $request->input('stockModel');
            $inventario->pbp_cantidad_minima    = $request->input('stockMinimoModel');
            if($inventario->save())
            {
                return $inventario->id;

            }else{
                return "ERROR";
            }
        }else{
            return $this->showStock($id);
        }
    }

    public function showStock($id)
    {
        return pv_bodega_producto_vista::find($id);
    }

    public function destroy($id)
    {
        $producto = pv_producto::find($id)->delete();
    }
}
