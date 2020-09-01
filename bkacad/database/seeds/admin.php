<?php

use Illuminate\Database\Seeder;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert(['ma'=> 1,'ten'=>'admin','mat_khau'=>'admin','ten_admin'=>'admin','cap_do'=>0]);
    }
}
