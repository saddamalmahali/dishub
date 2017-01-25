<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\RiwayatPendidikan;

class RiwayatPendidikanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $riwayat = RiwayatPendidikan::select('id_pegawai')->get();
        $pegawai = Pegawai::whereIn('id', $riwayat)->get();
        return view('riwayat_pendidikan.index', ['data_pegawai'=>$pegawai]);
    }

    public function tambah()
    {
        $riwayat_pendidikan = RiwayatPendidikan::select('id_pegawai')->get();
        
        $pegawai = Pegawai::where('status', '=', 'pns')->whereNotIn('id', $riwayat_pendidikan)->get();
        return view('riwayat_pendidikan.tambah', ['pegawai'=>$pegawai]);
    }
    public function tambah_riwayat(Request $request)
    {
        
        
        $data_riwayat = $request->input('input_riwayat_pendidikan');

        if($data_riwayat != null){
            foreach ($data_riwayat as $riwayat) {
                $riwayat_pendidikan = new RiwayatPendidikan();
                $riwayat_pendidikan->id_pegawai = $request->input('pegawai');
                $riwayat_pendidikan->tingkat =$riwayat['tingkat'] ;
                $riwayat_pendidikan->jurusan = $riwayat['jurusan'];
                $riwayat_pendidikan->angkatan = $riwayat['angkatan'];

                if(! $riwayat_pendidikan->save()){
                    break;
                }
            }

            return redirect('/riwayat_pendidikan/index');
        }

        $riwayat_pendidikan->id_pegawai = $request->input('pegawai');

        
    }
}
