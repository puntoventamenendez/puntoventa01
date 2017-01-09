<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_caja extends Model
{
    //
    protected $table 		= 'pv_caja';
    protected $fillable		= array('pca_id','pca_caja');
    public $primaryKey 		= 'pca_id';
}
