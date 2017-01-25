<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerpanjangKontrakTksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perpanjang_kontrak_tks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pegawai');
            $table->string('no_sp')->length(50)->nullable();
            $table->date('tanggal_sp')->nullable();
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
        Schema::dropIfExists('perpanjang_kontrak_tks');
    }
}
