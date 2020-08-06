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
            $table->integer('ma_sinh_vien')->primary()->unsigned();
            $table->integer('ma_mon_hoc')->unsigned();
            $table->integer('ma_kieu_thi')->unsigned();
            $table->integer('so_lan_thi');
            $table->float('diem_thi');
            //
            $table->foreign('ma_mon_hoc')
           ->references('ma')->on('mon_hoc')
           ->onDelete('cascade');
           //
           $table->foreign('ma_kieu_thi')
           ->references('ma')->on('kieu_thi')
           ->onDelete('cascade');
           //
           $table->foreign('ma_sinh_vien')
           ->references('ma')->on('sinh_vien')
           ->onDelete('cascade');
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
