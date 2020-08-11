<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nganh_Hoc_Chi_Tiet extends Model
{
    protected $table = 'nganh_hoc_chi_tiet';
    protected $fillable=[
        'ma_nganh_hoc',
        'ma_mon_hoc'
    ];
    public $timestamps=false;
    protected $primaryKey=['ma_nganh_hoc','ma_mon_hoc'];
    public function array_nganh_hoc(){
        return $this->belongsToMany('App\Models\Mon_hoc','nganh_hoc_chi_tiet','ma_nganh_hoc','ma_mon_hoc');
    }
   
}
