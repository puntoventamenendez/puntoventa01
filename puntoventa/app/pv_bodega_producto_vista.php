<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_bodega_producto_vista extends Model
{
    //
    protected $table 		= 'vista_bodega_producto';
    protected $fillable		= array('pbp_id','pv_bodega_pb_id','pb_bodega','pv_producto_pp_id','pbp_cantidad','pbp_cantidad_minima');
    public $primaryKey 		= 'pv_producto_pp_id';
}
