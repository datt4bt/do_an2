<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('ma');
            $table->string('ten_dang_nhap',50);
            $table->string('mat_khau',50);
            $table->string('ten_admin',100);
            $table->string('email',100)->nullable();
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