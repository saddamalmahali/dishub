<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePangkatGolongansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pangkat_golongan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pangkat')->length(50);
            $table->enum('golongan',['I','II','III','IV']);
            $table->enum('ruang',['a','b','c','d','e']);
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
        Schema::dropIfExists('pangkat_golongan');
    }
}
