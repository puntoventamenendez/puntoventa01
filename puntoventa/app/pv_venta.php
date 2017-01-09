<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_venta extends Model
{
    //
    protected $table 		= 'pv_venta';
    protected $fillable		= array('pv_id','pv_usuario_pus_id','pv_total_neto','pv_impuesto','pv_total_documento','pv_descuento_documento','pv_caja_pca_id','pv_forma_pago_pfp_id');
    public $primaryKey 		= 'pv_id';
}
