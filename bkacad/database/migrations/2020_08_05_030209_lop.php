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
            $table->string('ten_lop',100);
            $table->integer('ma_nganh_hoc')->unsigned();
            $table->foreign('ma_nganh_hoc')
           ->references('ma')->on('nganh_hoc')
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
