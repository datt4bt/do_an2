<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiemThi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('diem_thi', function (Blueprint $table) {
            $table->integer('ma_sinh_vien')->unsigned();
            $table->integer('ma_mon_hoc')->unsigned();
            $table->integer('ma_kieu_diem')->unsigned();
            $table->integer('so_lan');
            $table->integer('hinh_thuc');
            $table->float('diem')->nullable();
            //
            $table->foreign('ma_mon_hoc')
           ->references('ma')->on('mon_hoc')
           ->onDelete('cascade');
           //
           $table->foreign('ma_kieu_diem')
           ->references('ma')->on('kieu_diem')
           ->onDelete('cascade');
           //
           $table->foreign('ma_sinh_vien')
           ->references('ma')->on('sinh_vien')
           ->onDelete('cascade');
           $table->primary(['ma_sinh_vien','ma_mon_hoc','ma_kieu_diem','so_lan','hinh_thuc'],'my_long_table_primary');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
