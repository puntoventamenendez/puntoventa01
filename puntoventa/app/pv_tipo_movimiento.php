<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_tipo_movimiento extends Model
{
    //
    protected $table 		= 'pv_tipo_movimiento';
    protected $fillable		= array('ptm_id','ptm_tipoMov');
    public $primaryKey 		= 'ptm_id';
}
