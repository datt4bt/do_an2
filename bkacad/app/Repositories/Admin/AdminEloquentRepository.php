<?php


namespace App\Repositories\Admin;


use App\Models\Admin;
use App\Repositories\EloquentRepository;

class AdminEloquentRepository extends EloquentRepository
{

    public function getModel () {
      return Admin::class;
    }
}