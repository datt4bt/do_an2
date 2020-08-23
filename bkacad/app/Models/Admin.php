<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{  protected $table = 'admin';
    protected $fillable=[
        'ma',
        'ten',
        'mat_khau',
        'ten_admin',
        'anh',
        'email',
        'cap_do'
    ];
    public $timestamps=false;
    protected $primaryKey='ma';
   
}
