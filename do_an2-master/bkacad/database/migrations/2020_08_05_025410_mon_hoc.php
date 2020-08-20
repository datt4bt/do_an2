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
            $table->integer('ma')->unsigned();
            $table->string('ten')->unique();
            $table->integer('ma_kieu_diem')->unsigned();
            $table->foreign('ma_kieu_diem')
           ->references('ma')->on('kieu_diem')
           ->onDelete('cascade');
           $table->primary(['ma']);
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
