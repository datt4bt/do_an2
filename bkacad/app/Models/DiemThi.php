<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiemThi extends Model
{
    protected $table = 'diem_thi';
    protected $fillable=[
        'ma_sinh_vien',
        'ma_mon_hoc',
        'ma_kieu_diem',
        'so_lan',
        'hinh_thuc',
        'diem'
    ];
    public $timestamps=false;
    public function sinh_vien()
    {
    return $this->belongsTo('App\Models\SinhVien', 'ma_sinh_vien');
    }
    public function mon_hoc()
    {
    return $this->belongsTo('App\Models\MonHoc', 'ma_mon_hoc');
    }
    public function kieu_diem()
    {
    return $this->belongsTo('App\Models\KieuDiem', 'ma_kieu_diem');
    }
    
}
