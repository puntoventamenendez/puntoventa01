<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_categoria_producto extends Model
{
    //
    protected $table 		= 'pv_categoria_producto';
    protected $fillable		= array('pcp_id','pv_categoria_pc_id','pv_producto_pp_id','pv_subcategoria_ps_id');
    public $primaryKey 		= 'pv_producto_pp_id';
}
