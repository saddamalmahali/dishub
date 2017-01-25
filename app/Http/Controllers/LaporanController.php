<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
class LaporanController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index_tkk()
    {
        $pegawai = Pegawai::where('no_sp_tkk_pertama', '!=', '')->where('status', '=', 'non_pns');
        $pegawai = $pegawai->paginate('9');
        return view('laporan.tkk.index', ['data_tkk'=>$pegawai]);
    }

    public function index_tks()
    {
        $pegawai = Pegawai::where('no_sp_tkk_pertama', '=', '')->where('status', '=','non_pns');
        $pegawai = $pegawai->paginate('9');
        return view('laporan.tks.index', ['data_tks'=>$pegawai]);
    }

    public function index_pns()
    {
        $pegawai = Pegawai::where('status', '=', 'pns');
        $pegawai = $pegawai->paginate('9');
        return view('laporan.pns.index', ['data_pns'=>$pegawai]);
    }
}
