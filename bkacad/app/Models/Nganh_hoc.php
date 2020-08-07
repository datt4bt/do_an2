<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nganh_hoc extends Model
{
    protected $table = 'nganh_hoc';
    protected $fillable=[
    	'ten'
    ];
    public $timestamps=false;
    protected $primaryKey='ma';

}
