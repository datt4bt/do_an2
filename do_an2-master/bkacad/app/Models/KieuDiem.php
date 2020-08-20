<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KieuDiem extends Model
{
    protected $table = 'kieu_diem';
    protected $fillable=[
        'ma',
    	'ten'
    ];
    public $timestamps=false;
    protected $primaryKey='ma';

}
