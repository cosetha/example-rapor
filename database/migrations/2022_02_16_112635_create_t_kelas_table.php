<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateTKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_kelas_siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_kelas');  
            $table->unsignedBigInteger('id_siswa'); 
            $table->foreign('id_kelas')->references('id')->on('m_kelas')->onDelete('cascade');
            $table->foreign('id_siswa')->references('id')->on('m_siswa')->onDelete('cascade');
            $table->integer('tahun')->length(5)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_kelas');
    }
}
