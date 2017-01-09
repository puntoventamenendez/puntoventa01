<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_compra extends Model
{
    //
    protected $table 		= 'pv_compra';
    protected $fillable		= array('pco_id','pco_total_documento','pco_impuesto','pc_proveedor_ppr_id','pv_usuario_pus_id');
    public $primaryKey 		= 'pco_id';
}
