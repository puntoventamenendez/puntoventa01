<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_forma_pago extends Model
{
    //
    protected $table 		= 'pv_forma_pago';
    protected $fillable		= array('pfp_id','pfp_forma_pago');
    public $primaryKey 		= 'pfp_id';
}
