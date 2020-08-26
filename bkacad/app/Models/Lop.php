<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    protected $table = 'lop';
    protected $fillable=[
        
        'ten',
        'ma_nganh_hoc',
        'ma_khoa_hoc'
    ];
    public $timestamps=false;
    protected $primaryKey='ma';
    public function nganh_hoc()
    {
    return $this->belongsTo('App\Models\NganhHoc', 'ma_nganh_hoc');
    }
    public function khoa()
    {
    return $this->belongsTo('App\Models\Khoa','ma_khoa_hoc');
    }
}
