<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nganh_Hoc extends Model
{
    protected $table = 'nganh_hoc';
    protected $fillable=[
        'ma',
    	'ten'
    ];
    public $timestamps=false;
    protected $primaryKey='ma';
    public function array_nganh_hoc(){
        return $this->belongsToMany('App\Models\Mon_hoc','nganh_hoc_chi_tiet','ma_nganh_hoc','ma_mon_hoc');
    }
}
