<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahun', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Y', 'N']);
            $table->integer('tahun')->length(5)->unique();
            $table->string('nama_kepsek');
            $table->string('nip_kepsek');
            $table->date('tanggal_rapor');
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
        Schema::dropIfExists('tahuns');
    }
}
