<?php

use Illuminate\Database\Seeder;

class kieu_diem extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kieu_diem')->insert(['ma'=> 1,'ten'=>'Lý thuyết']);
        DB::table('kieu_diem')->insert(['ma'=> 2,'ten'=>'Thực hành']);
        DB::table('kieu_diem')->insert(['ma'=> 3,'ten'=>'Lý thuyết & Thực hành']);
    }
}
