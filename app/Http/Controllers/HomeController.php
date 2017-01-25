<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Pensiun;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tkk = Pegawai::where('no_sp_tkk_pertama', '!=', '')->where('status', '=', 'non_pns')->count();
        $persen_tkk = $this->getPersentase($tkk);
        $data_tkk = [
            'jumlah_tkk'=>$tkk,
            'persentase_tkk'=>$persen_tkk
        ];

        $tks = Pegawai::where('no_sp_tkk_pertama', '=', '')->where('status', '=','non_pns')->count();
        $persen_tks = $this->getPersentase($tks);
        $data_tks = [
            'jumlah_tks'=>$tks,
            'persentase_tks'=>$persen_tks
        ];

        $pensiun = Pensiun::select('id_pegawai')->get();
        $pns = Pegawai::where('status', '=', 'pns')->whereNotIn('id', $pensiun)->count();
        $persen_pns = $this->getPersentase($pns);
        $data_pns = [
            'jumlah_pns'=>$pns,
            'persentase_pns'=>$persen_pns
        ];

        $ps = Pegawai::where('status', '=', 'pns')->whereIn('id', $pensiun)->count();
        $persen_ps = $this->getPersentase($ps);
        $data_ps = [
            'jumlah_ps'=>$ps,
            'persentase_ps'=>$persen_ps
        ];
        $data_pensiun = Pegawai::where('status', '=', 'pns')->whereIn('id', $pensiun)->limit(5)->get();

        $data_chart = [$pns, $tkk, $tks, $ps];

        return view('home', [
                                'data_tkk'=>$data_tkk,
                                'data_tks'=>$data_tks,
                                'data_pns'=>$data_pns,
                                'data_ps'=>$data_ps,
                                'data_chart'=>$data_chart,
                                'data_pensiun'=>$data_pensiun
                            ]);
    }

    private function getPersentase($jumlah_satuan){
        $pegawai = Pegawai::count();
        
        $persen = "";

        if($pegawai != null){
            $persen = ($jumlah_satuan/$pegawai)*100;
        }else{
            $persen = 0;
        }    
        
        return $persen;
    }
}
