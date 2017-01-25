<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Pegawai extends Model
{
    protected $table='pegawai';

    public function getPnsLamaJabatan($tawal, $takhir){
        $sql = "SELECT concat(FLOOR(PERIOD_DIFF(DATE_FORMAT($takhir, '%Y%m'), DATE_FORMAT($tawal, '%Y%m'))/12), 'tahun', MOD(PERIOD_DIFF(DATE_FORMAT($takhir, '%Y%m'), DATE_FORMAT($tawal, '%Y%m')), 12), 'Bulan')";
        $pdo = DB::connection()->getPdo();
        foreach ($pdo->query($sql) as $row) {
            dd($row);
        }
    }

    public function data_riwayat_pendidikan()
    {
        return $this->hasMany('App\RiwayatPendidikan', 'id_pegawai', 'id');
    }

    public function golongan()
    {
        return $this->hasOne('App\PangkatPegawai', 'id_pegawai', 'id');
    }
    public function pensiun()
    {
        return $this->hasOne('App\Pensiun', 'id_pegawai', 'id');
    }
}
