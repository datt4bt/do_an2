<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('lop', function (Blueprint $table) {
            $table->increments('ma');
            $table->string('ten',100);
            $table->integer('ma_nganh_hoc')->unsigned();
            $table->foreign('ma_nganh_hoc')
           ->references('ma')->on('nganh_hoc')
           ->onDelete('cascade');
           $table->integer('ma_khoa_hoc')->unsigned();
           $table->foreign('ma_khoa_hoc')
          ->references('ma')->on('khoa')
          ->onDelete('cascade');
          
            //
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
