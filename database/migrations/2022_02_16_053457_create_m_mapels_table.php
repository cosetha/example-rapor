<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMMapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_mapel', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('kelompok', ['A', 'B','C']);
            $table->enum('sub', ['MUNAS','MUKEL','C1', 'C2','C3']);
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
        Schema::dropIfExists('m_mapels');
    }
}
