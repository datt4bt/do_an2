<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MonHoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('mon_hoc', function (Blueprint $table) {
            $table->increments('ma');
            $table->string('ten_mon_hoc');
            $table->integer('ma_nganh_hoc_chi_tiet')->unsigned();
            $table->foreign('ma_nganh_hoc_chi_tiet')
           ->references('ma')->on('nganh_hoc_chi_tiet')
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
