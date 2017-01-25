@extends('layouts.app')
@section('content')
<div class='container'>
    <div class='col-md-8 col-md-offset-2'>
        <div class='panel panel-info'>
            <div class='panel-heading'>
                <h2 class='panel-title'>Form Edit Pensiun</h2>
            </div>
            <div class='panel-body'>
                <form class='form-horizontal' action='{{url("/pensiun/tambah")}}' method='post'>
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$pensiun->id}}">
                    <div class="form-group">
                        <label for="nama_pangkat" class="col-sm-3 control-label">Pegawai</label>
                        <div class="col-sm-9">
                            <select name='id_pegawai' class="form-control" id='select_id_pegawai' disabled>
                                <option disabled selected>Pilih Pegawai</option>
                                @forelse ($data_pegawai as $pegawai)
                                    <option value="{{$pegawai->id}}" {{$pensiun->id_pegawai == $pegawai->id ? 'selected="true"': ''}}>{{$pegawai->nip.' | '.$pegawai->nama_lengkap}}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="golongan" class="col-sm-3 control-label">Jenis Pensiun</label>
                        <div class="col-sm-9">
                            <select name="jenis_pensiun" class="form-control">
                                <option value="" disabled selected>Pilih Pegawai</option>
                                <option value="pegawai" {{$pensiun->jenis_pensiun == 'pegawai' ? 'selected="true"': ''}}>Pensiun Pegawai</option>
                                <option value="dini" {{$pensiun->jenis_pensiun == 'dini' ? 'selected="true"': ''}}>Pensiun Dini</option>
                                <option value="meninggal" {{$pensiun->jenis_pensiun == 'meninggal' ? 'selected="true"': ''}}>Pensiun Karena Meninggal</option>
                                <option value="sakit" {{$pensiun->jenis_pensiun == 'sakit' ? 'selected="true"': ''}}>Pensiun Karena Sakit</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ruang" class="col-sm-3 control-label">TMTP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tmtp" name='tmtp' placeholder="Pilih Tanggal" value="{{$pensiun->tmtp}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ruang" class="col-sm-3 control-label">No SKPN</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="noskpn" name='no_skpn' placeholder="Input No SKPN" value="{{$pensiun->no_skpn}}">
                        </div>
                    </div>
                    
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="pull-right" style="margin-right:20px">
                    <button type="submit" class="btn btn-default">Simpan</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#select_id_pegawai').select2();
    $('#tmtp').datepicker();
</script>
@endsection