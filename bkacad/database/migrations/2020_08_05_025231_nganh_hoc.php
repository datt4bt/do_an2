<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NganhHoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
       Schema::create('nganh_hoc', function (Blueprint $table) {
           $table->integer('ma')->unsigned();
           $table->string('ten',100)->unique();
           $table->primary(['ma']);
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
