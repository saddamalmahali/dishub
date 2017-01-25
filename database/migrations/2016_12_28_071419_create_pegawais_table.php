<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap')->length(50);
            $table->string('tempat_lahir')->length(20);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['L','P']);
            $table->enum('agama',['islam','protestan','katolik','hindu','buddha','konghucu','lainnya']);
            $table->string('nip')->length(18)->nullable();
            $table->enum('status',['pns','non_pns']);
            $table->string('no_sp_pertama')->length(50)->nullable();
            $table->date('tanggal_sp')->nullable();
            $table->string('no_sp_tkk_pertama')->length(50)->nullable();
            $table->date('tanggal_sp_tkk')->nullable();
            $table->string('no_sk')->length(50)->nullable();
            $table->date('tanggal_sk')->nullable();
            $table->date('tmt');
            $table->enum('pendidikan',['sd','smp','sltp','mts','sma','slta','ma','d3','d4','s1'])->nullable();
            $table->string('jurusan')->length(20)->nullable();
            $table->integer('tahun')->length(4)->nullable();
            $table->text('alamat')->nullable(); 
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
        Schema::dropIfExists('pegawai');
    }
}
