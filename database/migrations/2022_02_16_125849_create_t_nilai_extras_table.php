<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTNilaiExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_nilai_extra', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun')->length(5)->unsigned();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_extra');
            $table->foreign('id_siswa')->references('id')->on('m_siswa')->onDelete('cascade');
            $table->foreign('id_extra')->references('id')->on('m_extra')->onDelete('cascade');
            $table->string('nilai');
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
        Schema::dropIfExists('t_nilai_extras');
    }
}
