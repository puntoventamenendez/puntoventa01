<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_subcategoria extends Model
{
    //
    protected $table 		= 'pv_subcategoria';
    protected $fillable		= array('ps_id','ps_subcategoria','pv_categoria_pc_id');
    public $primaryKey 		= 'ps_id';
    public $foreignkey		= 'pv_categoria_pc_id';

}
