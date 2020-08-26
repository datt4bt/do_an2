<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NganhHoc extends Model
{
    protected $table = 'nganh_hoc';
    protected $fillable=[
        
    	'ten'
    ];
    public $timestamps=false;
    protected $primaryKey='ma';
    public function array_mon_hoc(){
        return $this->belongsToMany('App\Models\MonHoc','nganh_hoc_chi_tiet','ma_nganh_hoc','ma_mon_hoc');
    }
}
