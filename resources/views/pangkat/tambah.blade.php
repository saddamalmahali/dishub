@extends('layouts.app')
@section('content')
<div class='container'>
    <div class='col-md-8 col-md-offset-2'>
        <div class='panel panel-info'>
            <div class='panel-heading'>
                <h2 class='panel-title'>Form Tambah Pangkat</h2>
            </div>
            <div class='panel-body'>
                <form class='form-horizontal' action='{{url("/pangkat/edit")}}' method='post'>
                    {{ csrf_field() }}
                
                    <div class="form-group">
                        <label for="nama_pangkat" class="col-sm-3 control-label">Nama Pangkat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_pangkat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="golongan" class="col-sm-3 control-label">Golongan</label>
                        <div class="col-sm-9">
                        <select class='form-control' name="golongan">
                            <option value='' selected disabled>Pilih Golongan</option>
                            <option value='I'>I</option>
                            <option value='II'>II</option>
                            <option value='III'>III</option>
                            <option value='IV'>IV</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ruang" class="col-sm-3 control-label">Ruang</label>
                        <div class="col-sm-9">
                        <select class='form-control' name="ruang">
                            <option value='' selected disabled>Pilih Ruang</option>
                            <option value='a'>a</option>
                            <option value='b'>b</option>
                            <option value='c'>c</option>
                            <option value='d'>d</option>
                            <option value='e'>e</option>
                        </select>
                        </div>
                    </div>
                    
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="pull-right" style="margin-right:20px">
                    <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection