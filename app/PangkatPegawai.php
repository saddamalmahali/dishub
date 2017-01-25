<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PangkatPegawai extends Model
{
    protected $table = 'pangkat_pegawai';

    public function pegawai()
    {
        return $this->hasOne('App\Pegawai', 'id', 'id_pegawai');
    }
    public function golongan()
    {
        return $this->hasOne('App\PangkatGolongan', 'id', 'id_golongan');
    }
}
