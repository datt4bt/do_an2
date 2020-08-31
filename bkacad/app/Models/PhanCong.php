<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhanCong extends Model
{
    protected $table = 'phan_cong';
    protected $fillable=[
        'ma_admin',
        'ma_mon_hoc',
        'ma_lop_hoc',
       
    ];
    public $timestamps=false;
    protected $primaryKey='ma_admin';
    public function admin()
    {
    return $this->belongsTo('App\Models\Admin', 'ma_admin');
    }
    public function mon_hoc()
    {
    return $this->belongsTo('App\Models\MonHoc', 'ma_mon_hoc');
    }
    public function lop()
    {
    return $this->belongsTo('App\Models\Lop', 'ma_lop_hoc');
    }
   


}
