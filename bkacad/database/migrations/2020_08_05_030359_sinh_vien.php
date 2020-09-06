<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SinhVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('sinh_vien', function (Blueprint $table) {
            $table->integer('ma')->unsigned();
            $table->string('ten',100);
            $table->boolean('gioi_tinh');
            $table->date('ngay_sinh');
            $table->string('sdt',15)->unique()->nullable();
            $table->string('dia_chi',200);
            $table->string('email',100)->nullable()->unique();
            $table->integer('ma_lop')->unsigned();
            $table->foreign('ma_lop')
           ->references('ma')->on('lop')
           ->onDelete('cascade');
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
