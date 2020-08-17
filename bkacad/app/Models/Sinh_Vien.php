<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sinh_Vien extends Model
{
    protected $table = 'sinh_vien';
    protected $fillable=[
        'ma',
        'ten',
        'gioi_tinh',
        'ngay_sinh',
        'sdt',
        'dia_chi',
        'email',
        'ma_lop'
    ];
    public $timestamps=false;
    protected $primaryKey='ma';
    public function lop()
    {
    return $this->belongsTo('App\Models\Lop', 'ma_lop');
    }
    public function getTenGioiTinhAttribute($value)
{
if($this->gioi_tinh==1) {
    return 'Nam';
} else {
    return 'Nữ';
    
}

}
}
