<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMMapelAhlisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_mapel_ahli', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('id_bidang');
            $table->foreign('id_bidang')->references('id')->on('t_keahlian')->onDelete('cascade');
            $table->integer('tingkat')->length(5)->unsigned();
            $table->enum('kelompok', ['C']);
            $table->enum('sub', ['C1', 'C2','C3']);
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
        Schema::dropIfExists('m_mapel_ahlis');
    }
}
