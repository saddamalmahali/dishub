<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\PangkatGolongan;
use App\PangkatPegawai;
use App\Pensiun;
use App\PerpanjangKontrakTkk;
use App\PerpanjangKontrakTks;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $pegawai=new Pegawai();
        $pegawai = $pegawai->paginate('7');
        return view('pegawai.index',['data_pegawai'=>$pegawai]);
    }
    
    public function tambah_pegawai_form(){
        return view('pegawai.tambah_pegawai');
    }
    
    public function tambah_pegawai(Request $request){
        $pegawai=new Pegawai();
        $pegawai->nama_lengkap=$request->input('nama_lengkap');
        $pegawai->tempat_lahir=$request->input('tempat_lahir');
        $pegawai->tanggal_lahir=date('Y-m-d',strtotime($request->input('tanggal_lahir')));
        $pegawai->agama=$request->input('agama');
        $pegawai->unit_kerja = $request->input('unit_kerja');
        $pegawai->jabatan = $request->input('jabatan_kantor');
        $pegawai->status=$request->input('status');
        $pegawai->tmt=date('Y-m-d', strtotime($request->input('tmt')));
        $pegawai->alamat=$request->input('alamat');
        $pegawai->jenis_kelamin=$request->input('jenis_kelamin');
        if($request->input('status')=='non_pns'){
            $pegawai->no_sp_pertama=$request->input('no_sp_pertama');
            $pegawai->tanggal_sp=date('Y-m-d',strtotime($request->input('tanggal_sp')));
            $pegawai->pendidikan=$request->input('pendidikan');
            $pegawai->jurusan=$request->input('jurusan');
            
            $pegawai->tahun=$request->input('tahun');
            $pegawai->no_sp_tkk_pertama=$request->input('no_sp_tkk_pertama');
            $pegawai->tanggal_sp_tkk=date('Y-m-d', strtotime($request->input('tgl_sp_tkk')));
            

        }else{
            $pegawai->nip=$request->input('nip');
            $pegawai->no_sk=$request->input('no_sk');
            $pegawai->tanggal_sk=date('Y-m-d', strtotime($request->input('tanggal_sk')));
        }
        if($pegawai->save()){
            return redirect('pegawai');
        }
    }

    public function update_pegawai($id){
        $pegawai=Pegawai::find($id);
        return view('pegawai.update_pegawai',['pegawai'=>$pegawai]);
    }

    public function save_pegawai(Request $request){
        $pegawai= Pegawai::find($request->input('id'));
        $pegawai->nama_lengkap=$request->input('nama_lengkap');
        $pegawai->tempat_lahir=$request->input('tempat_lahir');
        $pegawai->tanggal_lahir=$request->input('tanggal_lahir');
        $pegawai->agama=$request->input('agama');
        $pegawai->unit_kerja = $request->input('unit_kerja');
        $pegawai->jabatan = $request->input('jabatan_kantor');
        $pegawai->nip=$request->input('nip');
        $pegawai->tmt=$request->input('tmt');
        $pegawai->jenis_kelamin=$request->input('jenis_kelamin');
        $pegawai->alamat=$request->input('alamat');
        if($pegawai->status=='non_pns'){
            $pegawai->no_sp_pertama=$request->input('no_sp_pertama');
            $pegawai->tanggal_sp=$request->input('tanggal_sp');
            $pegawai->pendidikan=$request->input('pendidikan');
            $pegawai->jurusan=$request->input('jurusan');
            $pegawai->tahun=$request->input('tahun');   
            $pegawai->no_sp_tkk_pertama=$request->input('no_sp_tkk_pertama');
            $pegawai->tanggal_sp_tkk=$request->input('tgl_sp_tkk');         
        }else{
            $pegawai->no_sk=$request->input('no_sk');
            $pegawai->tanggal_sk=$request->input('tanggal_sk');
        }
        if($pegawai->save()){
            return redirect('pegawai');
        }
    }

    public function hapus_pegawai(Request $request){
        $pegawai= Pegawai::find($request->input('id'));
        if($pegawai->delete()){
            $pesan='sukses!!!';
            return json_encode($pesan);
        }
    }

//Menu Pangkat
    public function index_pangkat(){
        $pangkat=new PangkatGolongan();
        $pangkat=$pangkat->paginate("7");
        return view('pangkat.index',['data_pangkat'=>$pangkat]);
    }

    public function tambah_pangkat(){
        return view('pangkat.tambah');
    }

    public function save_pangkat(Request $request){
        $id_pangkat=$request->input('id');
        if($id_pangkat!=null){
            $pangkat=PangkatGolongan::find($id_pangkat);
            $pangkat->nama_pangkat=$request->input('nama_pangkat');
            $pangkat->golongan=$request->input('golongan');
            $pangkat->ruang=$request->input('ruang');
            if($pangkat->save()){
                return redirect('/pangkat/index');
            }
        }else{
            $pangkat= new PangkatGolongan();
            $pangkat->nama_pangkat=$request->input('nama_pangkat');
            $pangkat->golongan=$request->input('golongan');
            $pangkat->ruang=$request->input('ruang');
            if($pangkat->save()){
                return redirect('/pangkat/index');
            }
        }
        
    }

    public function edit_pangkat($id){
        $pangkat=PangkatGolongan::find($id);
        return view('pangkat.edit',['data_pangkat'=>$pangkat]);
    }

    public function hapus_pangkat(Request $request){
        $pangkat= PangkatGolongan::find($request->input('id'));
        if($pangkat->delete()){
            $pesan='sukses!!!';
            return json_encode($pesan);
        }
    }

    //Menu Pangkat dan Golongan

    public function index_pangkat_golongan()
    {
        $pangkat = PangkatPegawai::all();
        return view('kepegawaian.pangkat_golongan.index', ['data_pangkat'=>$pangkat]);
    }

    public function tambah_pangkat_golongan()
    {
        $pegawai = Pegawai::where('nip', '!=', '')->get();
        $pangkat = PangkatGolongan::all();
        return view('kepegawaian.pangkat_golongan.tambah', ['data_pegawai'=>$pegawai, 'data_pangkat'=> $pangkat]);
    }

    public function save_pangkat_golongan(Request $request)
    {
        $id_pangkat = $request->input('id');
        if($id_pangkat == null){
            $pangkat = new PangkatPegawai();
            $pangkat->id_pegawai = $request->input('id_pegawai');
            $pangkat->id_golongan = $request->input('id_golongan');
            $pangkat->no_sk = $request->input('no_sk');
            $pangkat->tanggal_sk =date('Y-m-d', strtotime( $request->input('tanggal_sk')));
            $pangkat->tmt = date('Y-m-d', strtotime( $request->input('tmt')));

            if($pangkat->save()){
                return redirect('/kepegawaian/pangkat_golongan/index');
            }
        }else{
            $pangkat = PangkatPegawai::find($id_pangkat);
            $pangkat->id_pegawai = $request->input('id_pegawai');
            $pangkat->id_golongan = $request->input('id_golongan');
            $pangkat->no_sk = $request->input('no_sk');
            $pangkat->tanggal_sk =date('Y-m-d', strtotime( $request->input('tanggal_sk')));
            $pangkat->tmt = date('Y-m-d', strtotime( $request->input('tmt')));

            if($pangkat->save()){
                return redirect('/kepegawaian/pangkat_golongan/index');
            }
        }
    }

    public function edit_pangkat_golongan($id)
    {
        $golongan = PangkatPegawai::find($id);

        $pegawai = Pegawai::where('nip', '!=', '')->get();
        $pangkat = PangkatGolongan::all();
        return view('kepegawaian.pangkat_golongan.edit', ['data_pegawai'=>$pegawai, 'data_pangkat'=> $pangkat, 'golongan'=>$golongan]);
    }

    public function hapus_pangkat_golongan(Request $request)
    {
        $pangkat= PangkatPegawai::find($request->input('id'));
        if($pangkat->delete()){
            $pesan='sukses!!!';
            return json_encode($pesan);
        }
    }

    public function index_pensiun()
    {
        $pensiun = new Pensiun();
        $pensiun = $pensiun->paginate('7');
        return view('pensiun.index', ['data_pensiun'=>$pensiun]);
    }

    public function tambah_pensiun()
    {
        $pensiun = Pensiun::select('id_pegawai')->get();
        $pegawai = Pegawai::where('status', '=', 'pns')->whereNotIn('id', $pensiun)->get();
        return view('pensiun.tambah', ['data_pegawai'=>$pegawai]);
    }

    public function save_pensiun(Request $request)
    {
        $id_pensiun = $request->input('id');

        if($id_pensiun == null){
            $pensiun = new Pensiun();
            $pensiun->id_pegawai = $request->input('id_pegawai');
            $pensiun->jenis_pensiun = $request->input('jenis_pensiun');
            $pensiun->tmtp = date('Y-m-d', strtotime($request->input('tmtp')));
            $pensiun->no_skpn = $request->input('no_skpn');

            if($pensiun->save()){
                return redirect('/pensiun');
            }
        }else{
            $pensiun = Pensiun::find($request->input('id'));
            
            $pensiun->jenis_pensiun = $request->input('jenis_pensiun');
            $pensiun->tmtp = date('Y-m-d', strtotime($request->input('tmtp')));
            $pensiun->no_skpn = $request->input('no_skpn');

            if($pensiun->save()){
                return redirect('/pensiun');
            }
        }
    }

    public function edit_pensiun($id){
        $pensiun = Pensiun::find($id);
        $filter = Pensiun::select('id_pegawai')->get();
        $pegawai = Pegawai::where('status', '=', 'pns')->get();
        return view('pensiun.edit', ['pensiun'=> $pensiun,'data_pegawai'=>$pegawai]);
    }

    public function hapus_pensiun(Request $request){
        $id = $request->input('id');
        $pensiun = Pensiun::find($id);

        if($pensiun->delete()){
            return redirect('/pensiun');
        }
    }

    public function view_pegawai($id)
    {
        $pegawai = Pegawai::find($id);
        return view('pegawai.view', ['pegawai'=>$pegawai]);
    }


    public function index_perpanjang_tks()
    {
        $pegawai = new PerpanjangKontrakTks();
        $pegawai = $pegawai->paginate('9');
        return view('pegawai.index_perpanjang_tks', ['data_tks'=>$pegawai]);
    }

    public function tambah_perpanjang_tks()
    {
        $pegawai = $pegawai = Pegawai::where('no_sp_tkk_pertama', '=', '')->where('status', '=','non_pns')->get();

        return view('pegawai.tambah_perpanjang_tks', ['data_pegawai'=>$pegawai]);
    }

    public function simpan_perpanjang_tks(Request $request)
    {
        $this->validate($request, [
            'id_pegawai'=>'required',
            'no_sp'=>'required',
            'tanggal_sp'=>'required',
            'tmt'=>'required',
        ]);

        $tks = new PerpanjangKontrakTks();
        $tks->id_pegawai = $request->input('id_pegawai');
        $tks->no_sp = $request->input('no_sp');
        $tks->tanggal_sp = date('Y-m-d', strtotime($request->input('tanggal_sp')));
        $tks->tmt = date('Y-m-d', strtotime($request->input('tmt')));

        if($tks->save())
        {
            return redirect('/kepegawaian/perpanjang_tks');
        }
    }

    public function update_perpanjang_tks($id)
    {
        $tks = PerpanjangKontrakTks::find($id);
        
        $pegawai = $pegawai = Pegawai::where('no_sp_tkk_pertama', '=', '')->where('status', '=','non_pns')->get();
        return view('pegawai.update_perpanjang_tks', ['tks'=>$tks, 'data_pegawai'=>$pegawai]);
    }
    public function simpan_update_perpanjang_tks(Request $request)
    {
        $this->validate($request, [
            'id_pegawai'=>'required',
            'no_sp'=>'required',
            'tanggal_sp'=>'required',
            'tmt'=>'required',
        ]);

        $tks = PerpanjangKontrakTks::find($request->input('id'));
        $tks->id_pegawai = $request->input('id_pegawai');
        $tks->no_sp = $request->input('no_sp');
        $tks->tanggal_sp = date('Y-m-d', strtotime($request->input('tanggal_sp')));
        $tks->tmt = date('Y-m-d', strtotime($request->input('tmt')));

        if($tks->save())
        {
            return redirect('/kepegawaian/perpanjang_tks');
        }
    }

    public function hapus_perpanjang_tks(Request $request)
    {
        $tks = PerpanjangKontrakTks::find($request->input('id'));

        if($tks->delete()){
            return json_encode('sukses');
        }
    }

    //Menu Perpanjangan TKK

    public function index_perpanjang_tkk()
    {
        $pegawai = new PerpanjangKontrakTkk();
        $pegawai = $pegawai->paginate('9');
        return view('pegawai.index_perpanjang_tkk', ['data_tkk'=>$pegawai]);
    }

    public function tambah_perpanjang_tkk()
    {
        $pegawai = Pegawai::where('no_sp_tkk_pertama', '!=', '')->where('status', '=', 'non_pns')->get();

        return view('pegawai.tambah_perpanjang_tkk', ['data_pegawai'=>$pegawai]);
    }

    public function simpan_perpanjang_tkk(Request $request)
    {
        $this->validate($request, [
            'id_pegawai'=>'required',
            'no_sp_tkk'=>'required',
            'tanggal_sp_tkk'=>'required',
            'no_sp'=>'required',
            'tanggal_sp'=>'required',
            'tmt'=>'required',
        ]);

        $tks = new PerpanjangKontrakTkk();
        $tks->id_pegawai = $request->input('id_pegawai');
        $tks->no_sp_tkk = $request->input('no_sp_tkk');
        $tks->tanggal_sp_tkk = date('Y-m-d', strtotime($request->input('tanggal_sp_tkk')));
        $tks->no_sp = $request->input('no_sp');
        $tks->tanggal_sp = date('Y-m-d', strtotime($request->input('tanggal_sp')));
        $tks->tmt = date('Y-m-d', strtotime($request->input('tmt')));

        if($tks->save())
        {
            return redirect('/kepegawaian/perpanjang_tkk');
        }
    }

    public function update_perpanjang_tkk($id)
    {
        $tkk = PerpanjangKontrakTkk::find($id);
        
        $pegawai = Pegawai::where('no_sp_tkk_pertama', '!=', '')->where('status', '=', 'non_pns')->get();
        return view('pegawai.update_perpanjang_tkk', ['tkk'=>$tkk, 'data_pegawai'=>$pegawai]);
    }
    public function simpan_update_perpanjang_tkk(Request $request)
    {
        $this->validate($request, [
            'id_pegawai'=>'required',
            'no_sp_tkk'=>'required',
            'tanggal_sp_tkk'=>'required',
            'no_sp'=>'required',
            'tanggal_sp'=>'required',
            'tmt'=>'required',
        ]);

        //return json_encode($request->all());

        $tkk = PerpanjangKontrakTkk::find($request->input('id'));
        $tkk->id_pegawai = $request->input('id_pegawai');
        $tkk->no_sp_tkk = $request->input('no_sp_tkk');
        $tkk->tanggal_sp_tkk = date('Y-m-d', strtotime($request->input('tanggal_sp_tkk')));
        $tkk->no_sp = $request->input('no_sp');
        $tkk->tanggal_sp = date('Y-m-d', strtotime($request->input('tanggal_sp')));
        $tkk->tmt = date('Y-m-d', strtotime($request->input('tmt')));

        if($tkk->save())
        {
            return redirect('/kepegawaian/perpanjang_tkk');
        }
    }

    public function hapus_perpanjang_tkk(Request $request)
    {
        $tkk = PerpanjangKontrakTkk::find($request->input('id'));

        if($tkk->delete()){
            return json_encode('sukses');
        }
    }
}
