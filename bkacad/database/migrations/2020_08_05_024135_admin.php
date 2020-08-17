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
            $table->integer('ma')->unsigned();
            $table->string('ten_dang_nhap',50)->unique();
            $table->string('mat_khau',50);
            $table->string('ten',100);
            $table->string('email',100)->nullable();
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
