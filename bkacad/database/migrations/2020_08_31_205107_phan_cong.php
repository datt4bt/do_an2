<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhanCong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phan_cong', function (Blueprint $table) {
            $table->integer('ma_admin')->unsigned();
            $table->foreign('ma_admin')
            ->references('ma')->on('admin')
            ->onDelete('cascade');
            $table->integer('ma_mon_hoc')->unsigned();
            $table->foreign('ma_mon_hoc')
            ->references('ma')->on('mon_hoc')
            ->onDelete('cascade');
            $table->integer('ma_lop_hoc')->unsigned();
            $table->foreign('ma_lop_hoc')
            ->references('ma')->on('lop')
            ->onDelete('cascade');
            $table->primary(['ma_admin','ma_mon_hoc','ma_lop_hoc']);

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
