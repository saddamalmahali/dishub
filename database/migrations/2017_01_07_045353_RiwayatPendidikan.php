<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RiwayatPendidikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pendidikan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pegawai')->length(10)->unsigned();
            $table->string('tingkat')->varchar(50);
            $table->string('jurusan')->varchar(50);
            $table->integer('angkatan')->length(10);
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
        Schema::dropIfExists('riwayat_pendidikan');
    }
}
