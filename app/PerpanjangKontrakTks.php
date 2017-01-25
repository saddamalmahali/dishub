<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerpanjangKontrakTks extends Model
{
    protected $table = 'perpanjang_kontrak_tks';

    public function pegawai()
    {
        return $this->hasOne('App\Pegawai', 'id', 'id_pegawai');
    }
}
