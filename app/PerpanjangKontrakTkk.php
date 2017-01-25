<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerpanjangKontrakTkk extends Model
{
    protected $table = 'perpanjang_kontrak_tkk';

    public function pegawai()
    {
        return $this->hasOne('App\Pegawai', 'id', 'id_pegawai');
    }
    
}
