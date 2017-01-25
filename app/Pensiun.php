<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pensiun extends Model
{
    protected $table = 'pensiun';


    public function pegawai()
    {
        return $this->hasOne('App\Pegawai', 'id', 'id_pegawai');        
    }
}
