<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vista_producto_barcod extends Model
{
    //
    protected $table 		= 'pv_producto';
    protected $fillable		= array('pp_id','pv_unidad_pu_id','pv_marca_pm_id','pp_barcod','pp_producto','pp_valor_mayorista');
    public $primaryKey 		= 'pp_barcod';
}
