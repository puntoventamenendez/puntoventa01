<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_inventario extends Model
{
    //
    protected $table 		= 'pv_inventario';
    protected $fillable		= array('pbp_id','pv_bodega_pb_id','pv_producto_pp_id','pbp_cantidad','pbp_cantidad_minima');
    public $primaryKey 		= 'pbp_id';
}
