<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NganhHocChiTiet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('nganh_hoc_chi_tiet', function (Blueprint $table) {
            $table->integer('ma_nganh_hoc')->unsigned();
            $table->integer('ma_mon_hoc')->unsigned();
            $table->foreign('ma_nganh_hoc')
            ->references('ma')->on('nganh_hoc')
            ->onDelete('cascade');
            $table->foreign('ma_mon_hoc')
            ->references('ma')->on('mon_hoc')
            ->onDelete('cascade');
            $table->primary(['ma_nganh_hoc','ma_mon_hoc']);

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
