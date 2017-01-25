@extends('layouts.app')
@section('content')
<div class='container'>
    <div class='col-md-8 col-md-offset-2'>
        <div class='panel panel-info'>
            <div class='panel-heading'>
                <h2 class='panel-title'>Form Edit Pangkat</h2>
            </div>
            <div class='panel-body'>
                <form class='form-horizontal' action='{{url("/pangkat/tambah")}}' method='post'>
                    {{ csrf_field() }}
                    <input name='id' type='hidden' value='{{$data_pangkat->id}}'>
                    <div class="form-group">
                        <label for="nama_pangkat" class="col-sm-3 control-label">Nama Pangkat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value='{{$data_pangkat->nama_pangkat}}' name="nama_pangkat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="golongan" class="col-sm-3 control-label">Golongan</label>
                        <div class="col-sm-9">
                        <select class='form-control' name="golongan">
                            <option value='' disabled>Pilih Golongan</option>
                            <option value='I' {{$data_pangkat->golongan=='I'?'selected=true':''}}>I</option>
                            <option value='II' {{$data_pangkat->golongan=='II'?'selected=true':''}}>II</option>
                            <option value='III' {{$data_pangkat->golongan=='III'?'selected=true':''}}>III</option>
                            <option value='IV' {{$data_pangkat->golongan=='IV'?'selected=true':''}}>IV</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ruang" class="col-sm-3 control-label">Ruang</label>
                        <div class="col-sm-9">
                        <select class='form-control' name="ruang">
                            <option value='' selected disabled>Pilih Ruang</option>
                            <option value='a' {{$data_pangkat->ruang=='a'?'selected=true':''}}>a</option>
                            <option value='b' {{$data_pangkat->ruang=='b'?'selected=true':''}}>b</option>
                            <option value='c' {{$data_pangkat->ruang=='c'?'selected=true':''}}>c</option>
                            <option value='d' {{$data_pangkat->ruang=='d'?'selected=true':''}}>d</option>
                            <option value='e' {{$data_pangkat->ruang=='e'?'selected=true':''}}>e</option>
                        </select>
                        </div>
                    </div>
                    
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="pull-right" style="margin-right:20px">
                    <button type="submit" class="btn btn-default">Update</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection