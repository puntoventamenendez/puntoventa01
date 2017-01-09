<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pv_marca extends Model
{
    protected $table 		= 'pv_marca';
    protected $fillable		= array('pm_id','pm_marca');
    public $primaryKey 		= 'pm_id';

}
