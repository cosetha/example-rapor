<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTWalikelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_walikelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kelas');  
            $table->unsignedBigInteger('id_guru'); 
            $table->foreign('id_kelas')->references('id')->on('m_kelas')->onDelete('cascade');
            $table->foreign('id_guru')->references('id')->on('m_guru')->onDelete('cascade');
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
        Schema::dropIfExists('t_walikelas');
    }
}
