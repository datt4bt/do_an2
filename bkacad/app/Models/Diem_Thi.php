<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diem_Thi extends Model
{
    protected $table = 'diem_thi';
    protected $fillable=[
        'ma_sinh_vien',
        'ma_mon_hoc',
        'ma_kieu_diem',
        'so_lan',
        'diem'
    ];
    public $timestamps=false;
    
}
