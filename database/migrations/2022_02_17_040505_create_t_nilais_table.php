<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_nilai_umum', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_guru');
            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_guru')->references('id')->on('m_guru')->onDelete('cascade');
            $table->foreign('id_siswa')->references('id')->on('m_siswa')->onDelete('cascade');
            $table->enum('jenis', ['Pengetahuan', 'Keterampilan']);
            $table->integer('nilai')->length(6)->unsigned();
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
        Schema::dropIfExists('t_nilais');
    }
}
