<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->string('unit_kerja')->length(50)->nullable();
            $table->string('jabatan')->length(50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->dropColumn('unit_kerja');
            $table->dropColumn('jabatan');
        });
    }
}
