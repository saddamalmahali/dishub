@extends('layouts.app')
@section('content')
<div class='container'>
    <div class='col-md-8 col-md-offset-2'>
        <div class='panel panel-info'>
            <div class='panel-heading'>
                <h2 class='panel-title'>Form Tambah Pegawai</h2>
            </div>
            <div class='panel-body'>
                <form class='form-horizontal' action='{{url("/tambah_pegawai")}}' method='post'>
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9">
                            <select class='form-control' id='status' name="status">
                                <option value='' selected disabled>Pilih Status</option>
                                <option value='pns'>PNS</option>
                                <option value='non_pns'>Non-PNS</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nip" class="col-sm-3 control-label">NIP</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="Input NIP">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap" class="col-sm-3 control-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Input Nama Lengkap">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir" class="col-sm-3 control-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Input Tempat Lahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir" class="col-sm-3 control-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Input Tanggal Lahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                            <select class='form-control' id='jenis_kelamin' name="jenis_kelamin">
                                <option value='' selected disabled>Pilih Jenis Kelamin</option>
                                <option value='L'>Laki-Laki</option>
                                <option value='P'>Perempuan</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="agama" class="col-sm-3 control-label">Agama</label>
                            <div class="col-sm-9">
                            <select class='form-control' id='agama' name="agama">
                                <option value='' selected disabled>Pilih Agama</option>
                                <option value='islam'>Islam</option>
                                <option value='protestan'>Protestan</option>
                                <option value='katolik'>Katolik</option>
                                <option value='hindu'>Hindu</option>
                                <option value='buddha'>Buddha</option>
                                <option value='konghucu'>Kong Hu Cu</option>
                                <option value='lainnya'>Lainnya</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="unit_kerja" class="col-sm-3 control-label">Unit Kerja</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" placeholder="Nama Unit Kerja">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jabatan_kantor" class="col-sm-3 control-label">Jabatan Kantor</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="jabatan_kantor" name="jabatan_kantor" placeholder="Jabatan kerja Satuan Unit">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_sp_awal" class="col-sm-3 control-label">No SP Awal</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="no_sp_awal" name="no_sp_pertama" placeholder="Input No SP Awal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_sp" class="col-sm-3 control-label">Tanggal SP</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="tanggal_sp_awal" name="tanggal_sp" placeholder="Input Tanggal SP">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tmt" class="col-sm-3 control-label">TMT</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="tmt" name="tmt" placeholder="Input TMT">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                            <textarea name="alamat" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="bg-warning" id="riwayat_pendidikan" style="padding:10px">
                            <div class="form-group">
                                <label for="no_sp_tkk_pertama" class="col-sm-3 control-label">No SP TKK</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="no_sp_tkk_pertama" name="no_sp_tkk_pertama" placeholder="Input No SP TKK Awal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tgl_sp_tkk" class="col-sm-3 control-label">Tgl SP TKK</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="tgl_sp_tkk" name="tgl_sp_tkk" placeholder="Input Tanggal SP TKK Pertama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pendidikan" class="col-sm-3 control-label">Pendidikan</label>
                                <div class="col-sm-9">
                                    <select class='form-control' id='pendidikan' name="pendidikan">
                                        <option value='' selected disabled>Pilih Pendidikan</option>
                                        <option value='sd'>SD</option>
                                        <option value='smp'>SMP</option>
                                        <option value='sltp'>SLTP</option>
                                        <option value='mts'>Madrasah Tsanawiyah</option>
                                        <option value='sma'>SMA</option>
                                        <option value='slta'>SLTA</option>
                                        <option value='ma'>Madrasah Alliyah</option>
                                        <option value='d3'>Diploma III</option>
                                        <option value='d4'>Diploma IV</option>
                                        <option value='s1'>S1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jurusan" class="col-sm-3 control-label">Jurusan</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Input Jurusan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tahun" class="col-sm-3 control-label">Tahun</label>
                                <div class="col-sm-9">
                                <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Input Tahun Lulus">
                                </div>
                            </div>
                        </div>
                        <div class="bg-warning" id="input_sk_awal" style="padding:10px">
                            <div class="form-group">
                                <label for="no_sk" class="col-sm-3 control-label">Nomor SK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="no_sk" id="no_sk" placeholder="Input No SK">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jurusan" class="col-sm-3 control-label">Tanggal SK</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="tanggal_sk" name="tanggal_sk" placeholder="Input Tanggal SK">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="pull-right" style="margin-right:20px">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#tanggal_lahir').datepicker();
    $('#tanggal_sp_awal').datepicker();
    $('#tmt').datepicker();
    $('#tgl_sp_tkk').datepicker();
    $('#tanggal_sk').datepicker();
    $(document).ready(function(){
        
        $("#riwayat_pendidikan").hide();
        $("#input_sk_awal").hide();
        $("#status").on("change",function(e){
            e.preventDefault();
            var status=$(this).val();
            if(status=="non_pns"){
                $("#riwayat_pendidikan").show(200);
                $("#input_sk_awal").hide(200);
                $("#nip").attr("readonly",true);
                $("#no_sp_awal").attr("readonly",false);
                $("#tanggal_sp_awal").attr("readonly",false);
                reset_nip();
            }else{
                console.log('pns');
                $("#riwayat_pendidikan").hide(200);
                $("#input_sk_awal").show(200);
                reset_pendidikan();
                $("#nip").attr("readonly",false);
                $("#no_sp_awal").attr("readonly",true);
                $("#tanggal_sp_awal").attr("readonly",true);
                reset_sp();
            }
        });
    });
    var reset_pendidikan=function(){
        $("#pendidikan").val("");
        $("#jurusan").val("");
        $("#tahun").val("");
    };
    var reset_nip=function(){
        $("#nip").val("");
        $("#no_sk").val("");
        $("#tanggal_sk").val("");
    };
    var reset_sp=function(){
        $("#no_sp_awal").val("");
        $("#tanggal_sp_awal").val("");
        
    };
</script>
@endsection