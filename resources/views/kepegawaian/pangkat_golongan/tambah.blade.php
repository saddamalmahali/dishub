@extends('layouts.app')
@section('content')
<div class='container'>
    <div class='col-md-8 col-md-offset-2'>
        <div class='panel panel-info'>
            <div class='panel-heading'>
                <h2 class='panel-title'>Form Tambah Golongan Pegawai</h2>
            </div>
            <div class='panel-body'>
                <form class='form-horizontal' action='{{url("/kepegawaian/pangkat_golongan/tambah")}}' method='post'>
                    {{ csrf_field() }}
                
                    <div class="form-group">
                        <label for="nama_pangkat" class="col-sm-3 control-label">Pegawai</label>
                        <div class="col-sm-9">
                            <select class='form-control input_id_pegawai' name="id_pegawai">
                                <option value='' selected disabled>Pilih Pegawai</option>
                                @forelse ($data_pegawai as $pegawai)
                                    <option value="{{$pegawai->id}}">{{$pegawai->nip. ' | '.$pegawai->nama_lengkap}}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="golongan" class="col-sm-3 control-label">Golongan</label>
                        <div class="col-sm-9">
                        <select class='form-control input_id_golongan' id="input_id_golongan" name="id_golongan">
                            <option value='' selected disabled>Pilih Golongan</option>
                            @forelse ($data_pangkat as $golongan)
                                <option value="{{$golongan->id}}">{{$golongan->nama_pangkat.' | '.$golongan->golongan.'/'.$golongan->ruang }}</option>
                            @empty
                                
                            @endforelse
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="no_sk" class="col-sm-3 control-label">Nomor SK</label>
                        <div class="col-sm-9">
                            <input type="text" name="no_sk" class="form-control" placeholder="Input No SK">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_sk" class="col-sm-3 control-label">Tanggal SK</label>
                        <div class="col-sm-9">
                            <input type="text" name="tanggal_sk"   class="form-control input_tanggal_sk" placeholder="Input Tanggal SK">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tmt" class="col-sm-3 control-label">TMT</label>
                        <div class="col-sm-9">
                            <input type="text" name="tmt" class="form-control input_tmt" placeholder="Input TMT">
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
<script type="text/javascript">
        $(".input_id_pegawai").select2();
        $(".input_id_golongan").select2();
        $(".input_tanggal_sk").datepicker();
        $(".input_tmt").datepicker();
</script>
@endsection