<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    protected $table = 'mon_hoc';
    protected $fillable=[
        'ma',
        'ten',
        'ma_kieu_diem'
    ];
    public $timestamps=false;
    protected $primaryKey='ma';
    public function kieu_diem()
    {
    return $this->belongsTo('App\Models\KieuDiem', 'ma_kieu_diem');
    }
    public function array_nganh_hoc(){
        return $this->belongsToMany('App\Models\MonHoc','nganh_hoc_chi_tiet','ma_mon_hoc','ma_nganh_hoc');
    }
  
}
