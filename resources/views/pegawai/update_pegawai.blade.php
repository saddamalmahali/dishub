@extends('layouts.app')
@section('content')
<div class='container'>
    <div class='col-md-8 col-md-offset-2'>
        <div class='panel panel-info'>
            <div class='panel-heading'>
                <h2 class='panel-title'>Form Update Pegawai</h2>
            </div>
            <div class='panel-body'>
                <form class='form-horizontal' action='{{url("/update_pegawai")}}' method='post'>
                    {{ csrf_field() }}
                    <input type='hidden' name='id' value='{{$pegawai->id}}'>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9">
                            <select class='form-control' id='status' name="status" disabled>
                                <option value='' selected disabled>Pilih Status</option>
                                <option value='pns' {{$pegawai->status=='pns'?'selected="true"':''}}>PNS</option>
                                <option value='non_pns' {{$pegawai->status=='non_pns'?'selected="true"':''}}>Non-PNS</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nip" class="col-sm-3 control-label">NIP</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="nip" name="nip" value='{{$pegawai->nip}}' placeholder="Input NIP" {{$pegawai->status=='non_pns'?'readonly="true"':''}}>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap" class="col-sm-3 control-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value='{{$pegawai->nama_lengkap}}' placeholder="Input Nama Lengkap">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir" class="col-sm-3 control-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value='{{$pegawai->tempat_lahir}}' placeholder="Input Tempat Lahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir" class="col-sm-3 control-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value='{{$pegawai->tanggal_lahir}}' placeholder="Input Tanggal Lahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                            <select class='form-control' id='jenis_kelamin' name="jenis_kelamin">
                                <option value='' selected disabled>Pilih Jenis Kelamin</option>
                                <option value='L' {{$pegawai->jenis_kelamin=='L'?'selected="true"':''}}>Laki-Laki</option>
                                <option value='P' {{$pegawai->jenis_kelamin=='P'?'selected="true"':''}}>Perempuan</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="agama" class="col-sm-3 control-label">Agama</label>
                            <div class="col-sm-9">
                            <select class='form-control' id='agama' name="agama">
                                <option value='' selected disabled>Pilih Agama</option>
                                <option value='islam' {{$pegawai->agama=='islam'?'selected="true"':''}}>Islam</option>
                                <option value='protestan' {{$pegawai->agama=='protestan'?'selected="true"':''}}>Protestan</option>
                                <option value='katolik' {{$pegawai->agama=='katolik'?'selected="true"':''}}>Katolik</option>
                                <option value='hindu' {{$pegawai->agama=='hindu'?'selected="true"':''}}>Hindu</option>
                                <option value='buddha' {{$pegawai->agama=='buddha'?'selected="true"':''}}>Buddha</option>
                                <option value='konghucu' {{$pegawai->agama=='konghucu'?'selected="true"':''}}>Kong Hu Cu</option>
                                <option value='lainnya' {{$pegawai->agama=='lainnya'?'selected="true"':''}}>Lainnya</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="unit_kerja" class="col-sm-3 control-label">Unit Kerja</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="unit_kerja" value="{{$pegawai->unit_kerja}}" name="unit_kerja" placeholder="Nama Unit Kerja">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jabatan_kantor" class="col-sm-3 control-label">Jabatan Kantor</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="jabatan_kantor" value="{{$pegawai->jabatan}}" name="jabatan_kantor" placeholder="Jabatan kerja Satuan Unit">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_sp_awal" class="col-sm-3 control-label">No SP Awal</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="no_sp_awal" name="no_sp_pertama" value='{{$pegawai->no_sp_pertama}}' placeholder="Input No SP Awal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_sp" class="col-sm-3 control-label">Tanggal SP</label>
                            <div class="col-sm-9">
                            <input type="date" class="form-control" id="tanggal_sp" name="tanggal_sp" value='{{$pegawai->tanggal_sp}}' placeholder="Input Tanggal SP">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tmt" class="col-sm-3 control-label">TMT</label>
                            <div class="col-sm-9">
                            <input type="date" class="form-control" id="tmt" name="tmt" value='{{$pegawai->tmt}}' placeholder="Input TMT">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                            <textarea name="alamat" class="form-control" rows="3">{{$pegawai->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="bg-warning" id="riwayat_pendidikan" style="padding:10px">
                            <div class="form-group">
                                <label for="pendidikan" class="col-sm-3 control-label">Pendidikan</label>
                                <div class="col-sm-9">
                                    <select class='form-control' id='pendidikan' name="pendidikan">
                                        <option value='' selected disabled>Pilih Pendidikan</option>
                                        <option value='sd' {{$pegawai->pendidikan=='sd'?'selected="true"':''}}>SD</option>
                                        <option value='smp' {{$pegawai->pendidikan=='smp'?'selected="true"':''}}>SMP</option>
                                        <option value='sltp' {{$pegawai->pendidikan=='sltp'?'selected="true"':''}}>SLTP</option>
                                        <option value='mts' {{$pegawai->pendidikan=='mts'?'selected="true"':''}}>Madrasah Tsanawiyah</option>
                                        <option value='sma' {{$pegawai->pendidikan=='sma'?'selected="true"':''}}>SMA</option>
                                        <option value='slta' {{$pegawai->pendidikan=='slta'?'selected="true"':''}}>SLTA</option>
                                        <option value='ma' {{$pegawai->pendidikan=='ma'?'selected="true"':''}}>Madrasah Alliyah</option>
                                        <option value='d3' {{$pegawai->pendidikan=='d3'?'selected="true"':''}}>Diploma III</option>
                                        <option value='d4' {{$pegawai->pendidikan=='d4'?'selected="true"':''}}>Diploma IV</option>
                                        <option value='s1' {{$pegawai->pendidikan=='s1'?'selected="true"':''}}>S1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jurusan" class="col-sm-3 control-label">Jurusan</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="jurusan" name="jurusan" value='{{$pegawai->jurusan}}' placeholder="Input Jurusan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tahun" class="col-sm-3 control-label">Tahun</label>
                                <div class="col-sm-9">
                                <input type="number" class="form-control" id="tahun" name="tahun" value='{{$pegawai->tahun}}' placeholder="Input Tahun Lulus">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class='panel-footer'>
                <div class="row">
                    <div class="pull-right" style="margin-right:20px">
                    <button type="submit" class="btn btn-default">Simpan</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var status=$("#status").val();
        console.log(status);
        if (status=="non_pns"){
            $("#riwayat_pendidikan").show();
            $("#nip").attr("readonly",true);
            $("#tanggal_sp").attr("readonly",false);
            $("#no_sp_awal").attr("readonly",false);
            reset_nip();
        }else{
            $("#riwayat_pendidikan").hide();
            $("#nip").attr("readonly",false);
            $("#tanggal_sp").attr("readonly",true);
            $("#no_sp_awal").attr("readonly",true);
        }
        $("#status").on("change",function(e){
            e.preventDefault();
            var status=$(this).val();
            if(status=="non_pns"){
                $("#riwayat_pendidikan").show(200);
                $("#nip").attr("readonly",true);
                $("#no_sp_awal").attr("readonly",false);
                $("#tanggal_sp").attr("readonly",false);
                reset_nip();
            }else{
                console.log('pns');
                $("#riwayat_pendidikan").hide(200);
                reset_pendidikan();
                $("#nip").attr("readonly",false);
                $("#no_sp_awal").attr("readonly",true);
                $("#tanggal_sp").attr("readonly",true);
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
    };
    var reset_sp=function(){
        $("#no_sp_awal").val("");
        $("#tanggal_sp").val("");
    };
</script>
@endsection