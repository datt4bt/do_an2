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
            $table->string('ten',50)->unique();
            $table->string('mat_khau',50);
            $table->string('ten_admin',100);
            $table->string('anh',200)->nullable();
            $table->string('email',100)->unique()->nullable();
            $table->boolean('cap_do');
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
