<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('nipdn')->length(11)->unsigned();
            $table->string('nama');
            $table->string('alamat');
            $table->integer('nisn')->length(11)->nullable()->unsigned();
            $table->integer('no_ijazah')->length(11)->nullable()->unsigned();
            $table->integer('tahun_ijazah')->length(11)->nullable()->unsigned();
            $table->string('email');
            $table->string('agama');
            $table->string('no_telp');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('asal_sekolah');
            $table->unsignedBigInteger('id_bidang');
            $table->foreign('id_bidang')->references('id')->on('t_keahlian')->onDelete('cascade');
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
        Schema::dropIfExists('m_siswas');
    }
}
