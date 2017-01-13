<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_producto extends Model
{
    //
    protected $table 		= 'pv_producto';
    protected $fillable		= array('pp_id','pv_unidad_pu_id','pv_marca_pm_id','pp_barcod','pp_producto','pp_valor','pp_valor_mayorista');
    public $primaryKey 		= 'pp_id';
}
