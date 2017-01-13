<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\pv_producto;

class VentasController extends Controller
{

    public function getDataProducto($id)
    {
        //return vista_producto_barcod::find($id);
        $dataProducto = DB::table('pv_producto')->where('pp_barcod', $id)->get();
        /*
        $producto = new pv_producto();
        $producto->pv_producto_pp_id    = $dataProducto->pp_id;
        $producto->ppv_cantidad         = 1;
        $producto->ppv_impuesto         = 0;
        $producto->ppv_descuento        = 0;
        $producto->ppv_valor_neto       = $dataProducto->pp_valor;
        */
        return $dataProducto;
    }

}
