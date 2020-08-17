<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mon_hoc extends Model
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
    return $this->belongsTo('App\Models\Kieu_diem', 'ma_kieu_diem');
    }
  
}
