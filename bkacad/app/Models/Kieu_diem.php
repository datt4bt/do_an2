<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kieu_diem extends Model
{
    protected $table = 'kieu_diem';
    protected $fillable=[
    	'ten'
    ];
    public $timestamps=false;
    protected $primaryKey='ma';

}