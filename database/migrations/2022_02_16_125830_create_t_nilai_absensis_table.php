<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTNilaiAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_nilai_absensi', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun')->length(5)->unsigned();
            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('id')->on('m_siswa')->onDelete('cascade');
            $table->integer('s')->length(3)->unsigned();
            $table->integer('i')->length(3)->unsigned();
            $table->integer('a')->length(3)->unsigned();  
            $table->string('keterangan');
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
        Schema::dropIfExists('t_nilai_absensis');
    }
}
