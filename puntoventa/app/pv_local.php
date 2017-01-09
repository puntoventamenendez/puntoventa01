<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_local extends Model
{
    //
    protected $table 		= 'pv_local';
    protected $fillable		= array('pl_id','pl_empresa','pl_direccion','pl_rut','pl_ciudad','pl_telefono','pl_email','pl_sitio_web');
    public $primaryKey 		= 'pl_id';
}
