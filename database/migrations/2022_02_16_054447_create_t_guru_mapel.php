<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGuruMapel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_guru_mapel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('m_guru_id');
            $table->unsignedBigInteger('m_kelas_id');
            $table->unsignedBigInteger('m_mapel_id');  
                    
           
            $table->foreign('m_guru_id')->references('id')->on('m_guru')->onDelete('cascade');
            $table->foreign('m_kelas_id')->references('id')->on('m_kelas')->onDelete('cascade');
            $table->foreign('m_mapel_id')->references('id')->on('m_mapel')->onDelete('cascade');
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
        Schema::dropIfExists('t_guru_mapel');
    }
}
