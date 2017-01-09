<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_unidad extends Model
{
    //
    protected $table 		= 'pv_unidad';
    protected $fillable		= array('pu_id','pu_unidad');
    public $primaryKey 		= 'pu_id';
}
