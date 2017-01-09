<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_producto_compra extends Model
{
    //
    protected $table 		= 'pv_producto_compra';
    protected $fillable		= array('ppc_id','pv_compra_pco_id','pv_producto_pp_id','pcc_valor_compra');
    public $primaryKey 		= 'ppc_id';
}
