<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePensiunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensiun', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pegawai')->length(10)->nullable();
            $table->enum('jenis_pensiun', ['pegawai', 'dini', 'meninggal', 'sakit']);
            $table->date('tmtp');
            $table->string('no_skpn');
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
        Schema::dropIfExists('pensiun');
    }
}
