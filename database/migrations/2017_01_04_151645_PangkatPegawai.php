<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PangkatPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pangkat_pegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pegawai')->length(10)->unsigned();
            $table->integer('id_golongan')->length(10)->unsigned();
            $table->string('no_sk')->length(50);
            $table->date('tanggal_sk');
            $table->date('tmt');
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
        Schema::dropIfExists('pangkat_pegawai');
    }
}
