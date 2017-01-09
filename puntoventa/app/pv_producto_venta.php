<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_producto_venta extends Model
{
    //
    protected $table 		= 'pv_producto_venta';
    protected $fillable		= array('ppv_id','pv_venta_pv_id','pv_producto_pp_id','ppv_valor_neto','ppv_impuesto','ppv_descuento','ppv_cantidad');
    public $primaryKey 		= 'ppv_id';
}
