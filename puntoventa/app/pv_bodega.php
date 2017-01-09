<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_bodega extends Model
{
    //
    protected $table 		= 'pv_bodega';
    protected $fillable		= array('pb_id','pb_bodega');
    public $primaryKey 		= 'pb_id';
}
