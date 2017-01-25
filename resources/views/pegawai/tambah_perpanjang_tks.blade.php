@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Perpanjangan</h3>
                </div>
                <form action="{{url('/kepegawaian/simpan_perpanjang_tks')}}">
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('id_pegawai') ? ' has-error' : '' }}">
                            <label>Pegawai</label>
                            <select name="id_pegawai" id="id_pegawai" class="form-control">
                                <option value="" selected disabled>Pilih Pegawai</option>
                                @forelse ($data_pegawai as $pegawai)
                                    <option value="{{$pegawai->id}}">{{$pegawai->nama_lengkap}}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                            @if ($errors->has('id_pegawai'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('id_pegawai') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('no_sp') ? ' has-error' : '' }}">
                            <label>No SP</label>
                            <input type="text" name="no_sp" class="form-control" placeholder="Input Nomor SP">
                            @if ($errors->has('no_sp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_sp') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('tanggal_sp') ? ' has-error' : '' }}">
                            <label>Tanggal SP</label>
                            <input type="text" name="tanggal_sp" id="tanggal_sp" class="form-control" placeholder="Input Tanggal SP">
                            @if ($errors->has('tanggal_sp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tanggal_sp') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('tmt') ? ' has-error' : '' }}">
                            <label>TMT</label>
                            <input type="text" name="tmt" id="tmt" class="form-control" placeholder="Input Tanggal TMT">
                            @if ($errors->has('tmt'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tmt') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary btn-sm pull-right" style="margin:12px;" value="Simpan">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <script>
        $('#id_pegawai').select2();
        $('#tanggal_sp').datepicker();
        $('#tmt').datepicker();
    </script>
@endsection