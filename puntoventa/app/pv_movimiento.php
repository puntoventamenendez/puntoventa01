<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_movimiento extends Model
{
    //
    protected $table 		= 'pv_movimiento';
    protected $fillable		= array('pm_id','pm_monto','pv_caja_pca_id','pv_usuario_pus_id','pv_tipo_movimiento_ptm_id','pm_descripcion');
    public $primaryKey 		= 'pm_id';
}
