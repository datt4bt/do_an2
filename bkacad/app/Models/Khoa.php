<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    protected $table = 'khoa';
    protected $fillable=[
    	'ten'
    ];
    public $timestamps=false;
    protected $primaryKey='ma';
}
