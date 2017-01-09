<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_usuario extends Model
{
    //
    protected $table 		= 'pv_usuario';
    protected $fillable		= array('pus_id','pus_nombre','pus_password','pus_estado','pv_local_pl_id');
    public $primaryKey 		= 'pus_id';
}
