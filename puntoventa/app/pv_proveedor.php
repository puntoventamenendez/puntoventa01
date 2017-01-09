<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_proveedor extends Model
{
    //
    protected $table 		= 'pv_proveedor';
    protected $fillable		= array('ppr_id','ppr_rut','ppr_proveedor','ppr_telefono','ppr_contacto','ppr_estado');
    public $primaryKey 		= 'ppr_id';
}
