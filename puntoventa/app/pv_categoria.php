<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_categoria extends Model
{
    //
    protected $table 		= 'pv_categoria';
    protected $fillable		= array('pc_id','pc_categoria');
    public $primaryKey 		= 'pc_id';
}
